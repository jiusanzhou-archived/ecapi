<div class="ng-footer">
  <div class="ng-ser-box">
  <div class="ng-ser-box-con">
    <div class="ng-promise clearfix">
					
    <div class="clear"></div>
</div>
    <?php if ($this->_var['helps']): ?> 
      <div class="ng-help-box"> 
    <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['foo']['iteration']++;
?> 
    <?php if ($this->_foreach['foo']['iteration'] < 6): ?>
    <dl>
      <dt><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
     
        <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <dd><a target="_blank" href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>" ><?php echo $this->_var['item']['short_title']; ?></a></dd>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    </dl>
    <?php endif; ?> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    <?php endif; ?>
   
    
    
     </div>
     
    <div class="ng-s-footer">
    	<div class="ng-s-f-con">
        	<div class="al">
            	<p>(주)한국가　서울특별시 영등포구 당산동 4가 80번지 SKV1 E동 1811</p>
                <p>TEL :1566-0086 Fax :0269695305 E-mail :krmall@krmall.com </p><br/>
                <p>통신판매업신고 :서울강남 - 02985 사업자등록번호 :131-86-43627</p>
            </div>
            <div class="ar">
            	<p>(株)韩购街　首尔市永登浦区堂山洞4街80号堂山SKV1大厦E栋1811号</p>
                <p>TEL :1566-0086 Fax :0269695305 E-mail :krmall@krmall.com</p><br/>
                <p>网络销售商申报 :江南 - 02985 公司注册号码 :131-86-43627</p>
            </div>
        </div>
        <div class="copyright">
     		<div align="center" style="margin:5px 0;"><a href=" http://www.ecmoban.com" target="_blank"><img src="themes/ecmoban_krmall2015/images/ecmoban.gif" alt="ECShop模板"></a></div>
            <p align="center"><?php echo $this->_var['copyright']; ?><?php echo $this->_var['lang']['icp_number']; ?>：<a href="http://www.miitbeian.gov.cn" target="_blank" rel="nofollow"><?php echo $this->_var['icp_number']; ?></a></p>
        </div>
      
	</div>
</div>




<link href="ecmoban_qq/images/qq.css" rel="stylesheet" type="text/css" />
<div class="QQbox" id="divQQbox" style="width: 170px; ">
  <div class="Qlist" id="divOnline" onmouseout="hideMsgBox(event);" style="display: none; " onmouseover="OnlineOver();">
    <div class="t"></div>
    <div class="infobox">我们营业的时间<br>
      9:00-18:00</div>
    <div class="con">
      <ul>
        
        <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?> 
        <?php if ($this->_var['im']): ?>
        <li><a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $this->_var['im']; ?>&amp;Site=<?php echo $this->_var['shop_name']; ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->_var['im']; ?>:4" height="16" border="0" alt="QQ" /> <?php echo $this->_var['im']; ?></a> </li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?> 
        <?php if ($this->_var['im']): ?>
        <li><a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo $this->_var['im']; ?></a></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <?php $_from = $this->_var['ym']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?> 
        <?php if ($this->_var['im']): ?>
        <li><a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $this->_var['im']; ?>n&.src=pg" target="_blank"><img src="themes/ecmoban_krmall2015/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $this->_var['im']; ?></a></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <?php $_from = $this->_var['msn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?> 
        <?php if ($this->_var['im']): ?>
        <li><img src="themes/ecmoban_krmall2015/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact=<?php echo $this->_var['im']; ?>"><?php echo $this->_var['im']; ?></a></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <?php $_from = $this->_var['skype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?> 
        <?php if ($this->_var['im']): ?>
        <li><img src="http://mystatus.skype.com/smallclassic/<?php echo urlencode($this->_var['im']); ?>" alt="Skype" /><a href="skype:<?php echo urlencode($this->_var['im']); ?>?call"><?php echo $this->_var['im']; ?></a></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        
        <?php if ($this->_var['service_phone']): ?>
        <li> 服务热线: <?php echo $this->_var['service_phone']; ?></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="b"></div>
  </div>
  <div id="divMenu" onmouseover="OnlineOver();" style="display: block; "><img src="ecmoban_qq/images/qq_1.gif" class="press" alt="在线咨询"></div>
</div>
<script type="text/javascript">
//<![CDATA[
var tips; var theTop = 120/*这是默认高度,越大越往下*/; var old = theTop;
function initFloatTips() {
tips = document.getElementById('divQQbox');
moveTips();
};
function moveTips() {
var tt=50;
if (window.innerHeight) {
pos = window.pageYOffset
}
else if (document.documentElement && document.documentElement.scrollTop) {
pos = document.documentElement.scrollTop
}
else if (document.body) {
pos = document.body.scrollTop;
}
pos=pos-tips.offsetTop+theTop;
pos=tips.offsetTop+pos/10;
if (pos < theTop) pos = theTop;
if (pos != old) {
tips.style.top = pos+"px";
tt=10;
//alert(tips.style.top);
}
old = pos;
setTimeout(moveTips,tt);
}
//!]]>
initFloatTips();
function OnlineOver(){
document.getElementById("divMenu").style.display = "none";
document.getElementById("divOnline").style.display = "block";
document.getElementById("divQQbox").style.width = "170px";
}
function OnlineOut(){
document.getElementById("divMenu").style.display = "block";
document.getElementById("divOnline").style.display = "none";
}
if(typeof(HTMLElement)!="undefined")    //给firefox定义contains()方法，ie下不起作用
{   
      HTMLElement.prototype.contains=function(obj)   
      {   
          while(obj!=null&&typeof(obj.tagName)!="undefind"){ //通过循环对比来判断是不是obj的父元素
   　　　　if(obj==this) return true;   
   　　　　obj=obj.parentNode;
   　　}   
          return false;   
      };   
}  
function hideMsgBox(theEvent){ //theEvent用来传入事件，Firefox的方式
　 if (theEvent){
　 var browser=navigator.userAgent; //取得浏览器属性
　 if (browser.indexOf("Firefox")>0){ //如果是Firefox
　　 if (document.getElementById('divOnline').contains(theEvent.relatedTarget)) { //如果是子元素
　　 return; //结束函式
} 
} 
if (browser.indexOf("MSIE")>0){ //如果是IE
if (document.getElementById('divOnline').contains(event.toElement)) { //如果是子元素
return; //结束函式
}
}
}
/*要执行的操作*/
document.getElementById("divMenu").style.display = "block";
document.getElementById("divOnline").style.display = "none";
}
</script>
