	<div class="container">
		<div class="row store">
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
        <? $character = range('A', 'Z');  
            echo '<ul class="nav">';?>
            <li class="nav-item"><a class="nav-link active page" data-nav-id="" style="padding-left: .7rem;" href="#">Top</a></li>
            <li class="nav-item"><a class="nav-link page" data-nav-id="" style="padding-left: .7rem;" href="#">#</a></li>
            <?foreach($character as $alphabet)
            {  
                echo '<li class="nav-item"><a class="nav-link page" rel="'.strtolower($alphabet).'" data-nav-id="'.strtolower($alphabet).'" data-stop="" style="padding-left: .7rem;" href="#">'.$alphabet.'</a></li>';  
            }  
            echo '</ul>';
            foreach($character as $alphabet)
            {
            echo '<div class="row store '.strtolower($alphabet).'"></div>'; 
            } 
        ?>
	</div>
<!--<p>Hello Store</p>-->
<?php echo 'Elapsed time: ' . $this->benchmark->elapsed_time();?>
<br>
<?php echo 'Memory Usage: ' . $this->benchmark->memory_usage();?>
<br>
<!--<button class="load_next_set_button">Load next store</button>
<div class="lload_here"></div>-->
<script>
$(document).ready(function(){
    //var requestSent = false;
    $('.page').on('click', function() {

        var srcEl = $(this);
        var dataid =  srcEl.data('nav-id');
        var stop = srcEl.data('stop');
        if(!stop){
        //if(!requestSent) //when it is true it will run
        //{
            //console.log(requestSent);
            //requestSent = true;
            //console.log(requestSent);
            //console.log(dataid);
            //console.log("data-nav-id::"+srcEl.data('nav-id')) ;     
            //})
            //console.log("class::"+dataid);
            //$("button").click(function(){
            $.ajax(
            {
                async: false,
                type: "POST",
                url: "ajax_call",
                data:{ 'letter' : dataid },

                success: function(data)
                {
                    $.each(JSON.parse(data), function(index, item){
                        $('.'+dataid).append('<div>' + item.name + '</div>');
                        //alert(item.name);
                    });
                    //$('.load_here').replaceWith(data);
                    //alert('no ok');
                    //requestSent = false;
                    //console.log(requestSent);
                    $('*[data-nav-id="'+dataid+'"]').data('stop', 'stop');

                },
                error: function(){alert('error'); requestSent = false;}
            });
        //}
        }
        //$(".store1").hide();

    });
    //here when the .nav-link clicked then the function fired and 
    //it store the rel value from anchor and store in content variable
    $('.page').click(function(e){
    e.preventDefault();
    var content = $(this).attr('rel');
    //where the .active class, it will remove the active class
    //and will add the active class to current clicked componenet
    $('.active').removeClass('active');
    $(this).addClass('active');
    //now .store class will be hidden and current component will be shown in dom
    $('.store').hide();
    $('.'+content).show();
});
});
</script>
