window.onload = function(){
    var line = document.getElementsByClassName('select');
    // alert(line.length);
    var click = false;
    var func = function(){
        var isdie = false;
        this.ajax = function(url,data,type,callback){
            var XMLHttpReq;
            function createXMLHttpRequest() {
                try {
                    XMLHttpReq = new ActiveXObject("Msxml2.XMLHTTP");//IE高版本创建XMLHTTP
                }
                catch(E) {
                    try {
                        XMLHttpReq = new ActiveXObject("Microsoft.XMLHTTP");//IE低版本创建XMLHTTP
                    }
                    catch(E) {
                        XMLHttpReq = new XMLHttpRequest();//兼容非IE浏览器，直接创建XMLHTTP对象
                    }
                }

            }
            function sendAjaxRequest(url) {
                createXMLHttpRequest();                                //创建XMLHttpRequest对象
                XMLHttpReq.open(type, url, true);
                XMLHttpReq.onreadystatechange = processResponse; //指定响应函数
                XMLHttpReq.send(data);
            }
            //回调函数
            function processResponse() {
                if (XMLHttpReq.readyState == 4) {
                    if (XMLHttpReq.status == 200) {
                        var text = XMLHttpReq.responseText;

                        /**
                         *实现回调
                         */
                         callback();
                        // text = window.decodeURI(text);
                        // var cp = document.getElementById("cp");
                        // cp.innerHTML = "";
                        // var values = text.split("|");
                        // for (var i = 0; i < values.length; i++) {
                        //     var temp = document.createElement("option");
                        //     temp.text = values[i];
                        //     temp.value = values[i];
                        //     cp.options.add(temp);
                        // }


                    }
                }

            }
            sendAjaxRequest(url);

        }
        this.animate = function(obj,name,time){
            var arr1 = ['rotate'];
            if(!isdie){
                var num = 0.0000000001;
                isdie = true;
                var isCss3 = false;

                var isdie = true;
                var isZ = true;
                
                for(var o in name){
                    if(o.indexOf(':') > 0){
                        isCss3 = true;
                        O = o.split(":");
                    }
                    if(isCss3){
                        var num = parseFloat(obj.style[""+O[0]+""].match(/([0-9])+/, ""));
                    }else{
                        var num = parseFloat(func.getStyle(obj,""+o+"").match(/([0-9])+/, ""));
                    }
                    // alert(num)
                    if(!num){
                        var num = 0;
                    }
                    var Interval = setInterval(function(){
                        if(parseFloat(name[o]) > num){

                            num+=5.9876543210;
                        }else if(parseFloat(name[o]) < num){
                            num-=5.9876543210;
                            isZ = false;

                        }else{
                            num = 0;
                        }
                        // alert(num);
                        if(isCss3){
                            var val = O[1]+"("+num+name[o].replace(/[(\d+)||(\d+.\d+)]+/,"")+")";
                            obj.style[""+O[0]+""]=val;
                        }else{
                            var val = ""+num+name[o].replace(/[(\d+)||(\d+.\d+)]+/,"")+"";
                            obj.style[""+o+""]=val;
                        }
                        // alert(val);
                        if(num > name[o].replace(/([a-z])+/, "") && isZ || num < name[o].replace(/([a-z])+/, "") && !isZ){
                            clearInterval(Interval);
                            isdie = false;
                            if(isCss3){
                                obj.style[""+O[0]+""]=O[1]+"("+name[o].replace(/([a-z])+/, "")+name[o].replace(/[(\d+)||(\d+.\d+)]+/,"")+")";
                            }else{
                                obj.style[""+o+""]=""+name[o].replace(/([a-z])+/, "")+name[o].replace(/[(\d+)||(\d+.\d+)]+/,"")+"";

                            }

                        }
                    },time);
                }
            }
            return this;
        }
        this.inarray = function(b,a){
            for (var i = 0; i <= a.length - 1; i++) {
                if(a[i] == b){
                    return true;
                }
                return false;
            };
        }
        this.getStyle = function (el, style){
           if(!+"\v1"){
             style = style.replace(/\-(\w)/g, function(all, letter){
               return letter.toUpperCase();
             });
             return el.currentStyle[style];
           }else{
             return document.defaultView.getComputedStyle(el, null).getPropertyValue(style)
           }
            }
        }
    var func = new func();
    var radio = false;
        $('line').click(function(event) {
            /* Act on the event */
            radio = true;
        });

    var form = document.getElementsByName('form')[0].onsubmit = function(){

        try{ 
        var input = document.getElementsByClassName('Input');
        // var data = "";
        var num = 0;
        for (var i = 0; i <= input.length; i++) {
            if(i == 1) continue;
            if(!input[i].value){
                if(!radio){
                    document.getElementsByClassName('error')[3].style.visibility = "visible";
                } else {
                    document.getElementsByClassName('error')[3].style.visibility = "hidden";
                }
                document.getElementsByClassName('error')[i].style.visibility = "visible";
                document.getElementsByClassName('errorAll')[0].style.visibility = "visible";
            }else{
                num++;
                
                document.getElementsByClassName('error')[i].style.visibility = "hidden";
                document.getElementsByClassName('errorAll')[0].style.visibility = "hidden";
                // data+=input[i].name+'='+input[i].value+"&";
            }
        };
        
        if(!radio){
            $('.error').eq(3).css('visibility', 'visible');
        }else{
            $('.error').eq(3).css('visibility', 'hidden');

        }
        }catch(e){  
        }
        if(num == 4){
            try{ 
                re = /^1[3|4|5|8][0-9]\d{4,8}$/;
                if(!re.test($('Input').eq(2).val())){
                    $('Input').eq(2).val('');
                    $('.error').find('div').eq(2).text('必须是数字长度为11位！');
                    $('.error').eq(2).css('visibility', 'visible');
                }else{
                    $.ajax({
                        url: AJAX_URL,
                        type: 'POST',
                        dataType: 'json',
                        data: $('form').serialize(),
                        success:function(data){
                            if(data.oid != ""){
                                $('div[success]').show();
                                $('div[success]').find('orderid').text(data.oid);
                                $('div[success]').find('name').text(data.name);
                                $('div[success]').find('phone').text(data.phone);
                                $('div[success]').find('button').click(function(){
                                location.reload();

                                })
//                                location.reload();
                            }else{
                                $('div[error]').show();
                                $('div[error]').find('button').click(function(){
                                    location.reload();

                                })
                            }
                        }
                    })
                    this.getElementsByClassName('submit')[0].value = '正在提交......';
                }
            }catch(e){  
            }
            
            

        }
        
        return false;

    }
    
    line[0].onclick = function(){

        if(!click){
            try{
            func.animate(line[0].getElementsByClassName('sanjiao')[0],{"transform:rotate":"180deg"},10);

            }catch(e){}
            click = true;

            document.getElementById('select').style.display = "inline-block";
            var li = document.getElementById('select').getElementsByTagName('li');
            for (var i = 0; i < li.length; i++) {
                li[i].index = i;
                li[i].onclick = function(){
                    var thisClick = this.index;
                    // alert(li[thisClick].innerText);
                    if(document.getElementById('xuexiao').innerText){
                        document.getElementById('xuexiao').innerText = li[thisClick].getElementsByTagName('span')[0].innerText;

                    }else{
                        document.getElementById('xuexiao').textContent = li[thisClick].textContent;
                    }
                    document.getElementsByName('xuexiao')[0].value = li[thisClick].getElementsByTagName('span')[0].textContent || textContentli[thisClick].getElementsByTagName('span')[0].innerText;
                    try{
                        func.animate(line[0].getElementsByClassName('sanjiao')[0],{"transform:rotate":"0deg"},10);
                    }catch(e){
                    }
                    
                    click = false;
                    document.getElementById('select').style.display = "none";

                }
            };
        }else{
            try{
            func.animate(line[0].getElementsByClassName('sanjiao')[0],{"transform:rotate":"0deg"},10);

            }catch(e){
                // alert(1);
                // line[0].getElementsByClassName('sanjiao')[0].style.transform = "rotate(180deg)"
            }
            click = false;
            document.getElementById('select').style.display = "none";
        }

    }
    // // 自动设置背景遮罩的高度
    // var noteBack = document.getElementById('note').getElementsByClassName('back')[0];
    // alert(noteBack.length);
    var windowHeight = window.screen.availHeight;
    // noteBack.style.height = windowHeight + 'px';
    // noteBack.style.display = 'note'
    $('.jsAutoHeight').css('height', windowHeight + 'px');
    // alert(windowHeight)

}