var btn = document.getElementById("btn");
btn.onclick = function(){
    var content = document.createElement("div");
    content.style.width = '300px';
    content.style.height = '300px';
    content.style.position = 'fixed';
    content.style.top = '0';
    content.style.left = '0';
    content.style.right = 0;
    content.style.bottom = 0;
    content.style.margin = 'auto'
    content.style.background = 'black';
    content.id='black'
    

    //创建关掉的图标
    var icon = document.createElement('div');
    icon.style.background = 'white';
    icon.style.width = '50px'
    icon.style.height = '50px'
    icon.id='icon'

    //遮罩层
    var bgcolor = document.createElement('div');
    bgcolor.style.width = '100%';
    bgcolor.style.height = '100%';
    bgcolor.style.background = 'rgba(0,0,0,0.5)';
    bgcolor.style.position ='fixed';
    bgcolor.style.top =0
    bgcolor.style.left =0


    var son = document.createElement('div')
    son.id = 'son'
    document.body.appendChild(son);
    son.appendChild(bgcolor)
    content.appendChild(icon)
    son.appendChild(content);

    icon.onclick = function(){
        son.remove()
    }

}