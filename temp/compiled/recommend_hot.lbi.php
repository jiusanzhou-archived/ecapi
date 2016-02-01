<?php if ($this->_var['hot_goods']): ?>
<?php if ($this->_var['cat_rec_sign'] != 1): ?>
<div class="xm-box">
  <div class="title">
  	<h2>热销商品</h2>
    <a class="more" href="search.php?intro=hot">更多</a>
  </div>
  <div id="show_hot_area" class="clearfix xm-boxs"> 
    <?php endif; ?> 
    <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <div class="goodsItem goodsItems"> <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"  class="goodsimg "/></a>
      <p class="f1"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></p>
      <p class="value bigsize">
      <font class="f1"> 
      <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
      <?php echo $this->_var['goods']['promote_price']; ?> 
      <?php else: ?> 
      <?php echo $this->_var['goods']['shop_price']; ?> 
      <?php endif; ?> 
      </font> 
     <font class="market"> 原价：<a><?php echo $this->_var['goods']['market_price']; ?></a></font>
     
      </p>
      
      </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    
    <?php if ($this->_var['cat_rec_sign'] != 1): ?> 
  </div>
</div>
<div class="blank"></div>
<?php endif; ?> 
<?php endif; ?> 
