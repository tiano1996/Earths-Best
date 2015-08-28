charset="utf8";
/*
Ajax 三类分级联动
settings 参数说明
-----
url:分类数据josn文件路径
first:默认一级分类
second:默认二级分类
third:默认地区（县）
nodata:无数据状态
required:必选项
------------------------------ */
(function($){
	$.fn.cateSelect=function(settings){
		if(this.length<1){return;}
		// 默认值
		settings=$.extend({
			url:"../data/second.min.js",
			first:null,
			second:null,
			third:null,
			nodata:null,
			required:true
		},settings);

		var box_obj=this;
		var first_obj=box_obj.find(".first");
		var second_obj=box_obj.find(".second");
		var third_obj=box_obj.find(".third");
		var first_val=settings.first;
		var second_val=settings.second;
		var third_val=settings.third;
		var select_preHtml=(settings.required) ? "" : "<option  value='choice'>请选择</option>";
		var second_json;

		// 赋值二级函数
		var secondStart=function(){
			var first_id=first_obj.get(0).selectedIndex;
			if(!settings.required){
				first_id--;
			};
			second_obj.empty().attr("disabled",true);
			third_obj.empty().attr("disabled",true);

			if(first_id<0||typeof(second_json.catelist[first_id].child)=="undefined"){
				if(settings.nodata=="none"){
					second_obj.css("display","none");
					third_obj.css("display","none");
				}else if(settings.nodata=="hidden"){
					second_obj.css("visibility","hidden");
					third_obj.css("visibility","hidden");
				}
                $("#other").remove();
				return;
			}
			
			// 遍历赋值二级下拉列表
			temp_html=select_preHtml;
			$.each(second_json.catelist[first_id].child,function(i,second){
				temp_html+="<option value='"+second.id+"'>"+second.cName+"</option>";
			});
			second_obj.html(temp_html).attr("disabled",false).css({"display":"","visibility":""});
			thirdStart();
		};

		// 赋值三级函数
		var thirdStart=function(){
			var first_id=first_obj.get(0).selectedIndex;
			var second_id=second_obj.get(0).selectedIndex;
			if(!settings.required){
				first_id--;
				second_id--;
			};
			third_obj.empty().attr("disabled",true);

			if(first_id<0||second_id<0||typeof(second_json.catelist[first_id].child[second_id].child)=="undefined"){
				if(settings.nodata=="none"){
					third_obj.css("display","none");
				}else if(settings.nodata=="hidden"){
					third_obj.css("visibility","hidden");
				};
                $("#other").remove();
				return;
			};
			
			// 遍历赋值三级下拉列表
			temp_html=select_preHtml;
            temp_html+="<option  value='choice'>请选择</option>";
            $.each(second_json.catelist[first_id].child[second_id].child,function(i,third){
				temp_html+="<option value='"+third.id+"'>"+third.cName+"</option>";
			});
			third_obj.html(temp_html).attr("disabled",false).css({"display":"","visibility":""});
		};

        // 赋值下级函数
        var elseStart=function(){
            if(!$("#other").length>0){
                box_obj.append("<select id='other'><option value='choice'>==</option></select>");
            }else{
                $("#other").html("<select id='other'><option value='choice'>==</option></select>");
            }
            var third_id=third_obj.get(0).value;
            if(third_id!=0){
            $.ajax({
                url: settings.url,
                async: true,
                data: {
                    method: "getCate",
                    dataId: third_id
                },
                dataType: "json",
                success: function(data) {
                    if(!jQuery.isEmptyObject(data.catelist)){
                        for(i=0;i<data.catelist.length;i++){
                            $("#other").append("<option value='"+data.catelist[i].id+"'>"+data.catelist[i].cName+"</option>");
                        }
                    }
                },
                error: function() {
                    console.log(arguments);
                }
            });
            }
        };

		var init=function(){
			// 遍历赋值一级下拉列表
			temp_html=select_preHtml;
			$.each(second_json.catelist,function(i,first){
				temp_html+="<option value='"+first.id+"'>"+first.cName+"</option>";
			});
            first_obj.html(temp_html);

			// 若有传入一级及二级的值，则选中。（setTimeout为兼容IE6而设置）
			setTimeout(function(){
				if(settings.first!=null){
					first_obj.val(settings.first);
					secondStart();
					setTimeout(function(){
						if(settings.second!=null){
							second_obj.val(settings.second);
							thirdStart();
							setTimeout(function(){
								if(settings.third!=null){
									third_obj.val(settings.third);
								}
							},1);
						}
					},1);
				}
			},1);

			first_obj.bind("change",function(){
				secondStart();
			});
			second_obj.bind("change",function(){
				thirdStart();
			});
            third_obj.bind("change",function(){
                elseStart();
            });
            $('.first').trigger('change');
		};

		// 设置一级二级json数据
		if(typeof(settings.url)=="string"){
			$.ajax({
					url: settings.url,
					async: true,
					data: {
						method: "getCate",
                        dataId: 0
					},
					dataType: "json",
					success: function(data) {
						second_json=data;
						init();
					},
					error: function() {
						console.log(arguments);
					}
				});
		}else{
			second_json=settings.url;
			init();
		}
	};
})(jQuery);