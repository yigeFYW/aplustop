function PageNation(select,name){
    //jquery 选择器
    this.select = select;
    var self = this;
    this.name = name;
    //放置一个预备变量
    var htm = "";
    var data = {};
    var thisname = this.name;
    var hander = '';
    var url1 = "";
    this.change_page = function(){
        //获取到文本框中的值
        var page = $("#pagination_value").val();
        //正则判断
        var pattern = /^\d{1,}$/;
        if(!pattern.test(page)){
            //正则没通过
            return false;
        }
        if(page > data.last_page || page == data.current_page){
            return false;
        }else{
            self.ajax(url1,page);
        }
    };
    this.ajax = function(url,page){
        $.ajax({
            url:url,
            data:{page:page},
            dataType:"json",
            type:"get",
            async:false,
            success:function(res){
                data = res;
                page_handle(data);
                hander(data.data);
            }
        });
    };
    this.laq_btn = function(){
        var page = parseInt(data.current_page)-1;
        self.ajax(url1,page);
    };
    this.raq_btn = function(){
        var page = parseInt(data.current_page)+1;
        self.ajax(url1,page);
    };
    this.pag_btn = function(e){
        var page = parseInt($(e).html());
        self.ajax(url1,page);
    };
    var page_handle = function(data){
        //修改分页
        var laq = '<li><a onclick="'+thisname+'.laq_btn()">&laquo;</a></li>';

        var laq1 = '<li class="disabled"><a>&laquo;</a></li>';

        var raq = '<li><a onclick="'+thisname+'.raq_btn()">&raquo;</a></li>';

        var raq1 = '<li class="disabled"><a>&raquo;</a></li>';

        //有事件
        var h =  function(page){
            return '<li><a onclick="'+thisname+'.pag_btn(this)">'+page+'</a></li>';
        };

        //无事件
        var h1 = function(page){
            return '<li class="disabled active"><a>'+page+'</a></li>';
        };

        var btn = function(total,value){
            return '&nbsp;&nbsp;<li>共'+total+'页,到<input type="text" id="pagination_value" value="'+value+'" style="width:3em;">  <button type="button" id="pagination_btn" onclick="'+thisname+'.change_page();" style="border:0;background:#1ab394;border-radius: 5px;color:#efefef;">确认</button> 页</li>';
        };
        //判断有几页
        var last_page = data.last_page;
        switch(last_page){
            case 1://只有1页
                htm = '';
                break;
            case 2://只有2页
                //判断当前在第几页
                if(data.current_page == 1){
                    //在第一页
                    htm = laq1+h1(1)+raq+btn(2,'');
                }else if(data.current_page == 2){
                    htm = laq+h(2)+raq1+btn(2,'');
                }
                break;
            case 3://只有3页
                //判断当前页数
                if(data.current_page == 1){
                    htm = laq1+h1(1)+h(2)+h(3)+raq+btn(3,'');
                }else if(data.current_page == 2){
                    htm = laq+h(1)+h1(2)+h(3)+raq+btn(3,'');
                }else if(data.current_page == 3){
                    htm = laq+h(1)+h(2)+h1(3)+raq1+btn(3,'');
                }
                break;
            case 4://只有4页
                if(data.current_page == 1){
                    htm = laq1+h1(1)+h(2)+h(3)+h(4)+raq+btn(4,'');
                }else if(data.current_page == 2){
                    htm = laq+h(1)+h1(2)+h(3)+h(4)+raq+btn(4,'');
                }else if(data.current_page == 3){
                    htm = laq+h(1)+h(2)+h1(3)+h(4)+raq+btn(4,'');
                }else if(data.current_page == 4){
                    htm = laq+h(1)+h(2)+h(3)+h1(4)+raq1+btn(4,'');
                }
                break;
            case 5://只有5页
                if(data.current_page == 1){
                    htm = laq1+h1(1)+h(2)+h(3)+h(4)+h(5)+raq+btn(5,'');
                }else if(data.current_page == 2){
                    htm = laq+h(1)+h1(2)+h(3)+h(4)+h(5)+raq+btn(5,'');
                }else if(data.current_page == 3){
                    htm = laq+h(1)+h(2)+h1(3)+h(4)+h(5)+raq+btn(5,'');
                }else if(data.current_page == 4){
                    htm = laq+h(1)+h(2)+h(3)+h1(4)+h(5)+raq+btn(5,'');
                }else if(data.current_page == 5){
                    htm = laq+h(1)+h(2)+h(3)+h(4)+h1(5)+raq+btn(5,'');
                }
                break;
            default:
                //5页以上
                //判断最大页数与当前页差值
                if(data.current_page == 1){
                    htm = laq1+h1(1)+h(2)+h(3)+h(4)+h(5)+raq+btn(data.last_page,'');
                }else if(data.current_page == 2){
                    htm = laq+h(1)+h1(2)+h(3)+h(4)+h(5)+raq+btn(data.last_page,'');
                }else if((data.last_page - data.current_page) == 0){
                    //当前页就是最后一页
                    htm = laq+h(data.current_page - 4)+h(data.current_page - 3)+h(data.current_page - 2)+h(data.current_page - 1)+h1(data.current_page)+raq1+btn(data.last_page,'');
                }else if((data.last_page - data.current_page) == 1){
                    htm = laq+h(data.current_page - 3)+h(data.current_page - 2)+h(data.current_page - 1)+h1(data.current_page)+h(data.current_page + 1)+raq+btn(data.last_page,'');
                }else{
                    htm = laq+h(data.current_page - 2)+h(data.current_page - 1)+h1(data.current_page)+h(data.current_page + 1)+h(data.current_page + 2)+raq+btn(data.last_page,'');
                }
                break;
        }
        $(self.select).html(htm);
    };
    this.init = function(url,collback){
        hander = collback;
        url1 = url;
        this.ajax(url,0);
    };
}