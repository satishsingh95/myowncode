	<div class="container">
		<div class="row store1">
	<?php foreach ($result as $item):
        $pvn=$item->name; 
        $explode=explode(' ', $pvn);
        $implode = implode("-", $explode);
		//echo $pvn;?>
		<? echo'<a href="/'.$implode.'-coupons/">'.ucwords($item->name).'</a>'; ?>
		<?php //echo '<img class="card-product-image" src="/assets/images/merchant/'.$item->slag.'.jpeg"/>';?>
		<? echo'<h1></h1>'; ?>
	 <? endforeach;?>

		</div>
        <div class="row store2"></div>
        <div class="row store3"></div>
        <div class="row store4"></div>
        <div class="row store5"></div>
        <div class="row store6"></div>
        <div class="row store7"></div>
        <div class="row store8"></div>
        <div class="row store9"></div>
        <div class="row store10 "></div>
        <div class="row store11"></div>
        <div class="row store12"></div>
        <div class="row store13"></div>
        <div class="row store14"></div>
	</div>
<p>Hello Store</p>
<?php echo 'Elapsed time: ' . $this->benchmark->elapsed_time();?>
<br>
<?php echo 'Memory Usage: ' . $this->benchmark->memory_usage();?>
<br>
<button class="load_next_set_button">Load next store</button>
<div class="lload_here"></div>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.ajax(
        {
            type: "POST",
            url: "ajax_call",
            data:{ 'letter' : 'b' },

            success: function(data)
            {
                $.each(JSON.parse(data), function(index,item){
        $(".store2").append('<div>' + item.name + '</div>');
        //alert(item.name);

        });         
                //$('.load_here').replaceWith(data);
                //alert('no ok');
            },
            error: function(){alert('error');}
        });
        $(".store1").hide();
    });
    //alert("Data:");
});
</script>
