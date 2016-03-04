<?php
$str= <<<'EOD'
<script>
     document.domain = 'luhu.in'
// 计算页面的实际高度，iframe自适应会用到
function calcPageHeight(doc) {
var cHeight = Math.max(doc.body.clientHeight, doc.documentElement.clientHeight)
var sHeight = Math.max(doc.body.scrollHeight, doc.documentElement.scrollHeight)
var height  = Math.max(cHeight, sHeight)
return height
}
window.onload = function() {
var height = calcPageHeight(document)
parent.document.getElementsByTagName('iframe')[0].style.height = height + 'px'     
}
</script></body>
EOD;
if (!isset($_GET['id'])) {
    echo "没有发现id参数";
    exit(0);
}
$file_path=$_GET['id'].".html";
if (!file_exists($file_path)) {
    echo "当前目录下没有发现{$file_path}文件.请联系管理员.";
    exit(0);
}
$content=file_get_contents($file_path);
$content=str_replace('</body>', $str, $content);
echo $content;