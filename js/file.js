$(function(){
    var wb;//读取完成的数据
    var rABS = false; //是否将文件读取为二进制字符串
    var fileBtn = $('#fileBtn');
    var demo = $('#demo')
    fileBtn.on('change',function(){
        importf(this);
    })

    function importf(obj) {//导入
        if(!obj.files) {
            return;
        }
        var f = obj.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var data = e.target.result;
            if(rABS) {
                wb = XLSX.read(btoa(fixdata(data)), {//手动转化
                    type: 'base64'
                });
            } else {
                wb = XLSX.read(data, {
                    type: 'binary'
                });
            }
            //wb.SheetNames[0]是获取Sheets中第一个Sheet的名字
            //wb.Sheets[Sheet名]获取第一个Sheet的数据
            var lists = XLSX.utils.sheet_to_json(wb.Sheets[wb.SheetNames[0]])
            demo.html(JSON.stringify(lists));
            sendData(lists);
        };
        if(rABS) {
            reader.readAsArrayBuffer(f);
        } else {
            reader.readAsBinaryString(f);
        }
    }
    //////////////////////////////////////////
        function sendData(lists){
            $.ajax({
                type:'POST',
                url:'./php/insert.php',
                data:{lists:lists},
                success:function(res){
                    console.log(res);
                }
            })
        }
    ///////////////////////////////////////
    function fixdata(data) { //文件流转BinaryString
        var o = "",
            l = 0,
            w = 10240;
        for(; l < data.byteLength / w; ++l) o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w, l * w + w)));
        o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w)));
        return o;
    }
})