<div class="container">
    <div class="col-md-offset-1 col-md-2">
        <div class="spacer"></div>
        <div class="greyback" style="padding: 10px">
            <h4>Box Subtotal</h4>
            <p>${{ boxSubtotal }}</p>
            <h4>Item Subtotal</h4>
            <p>${{ itemSubtotal }}</p>
            <!-- <h4>25% discount for ordering before April 10</h4>
            <p>${{ discount }}</p> -->
            <h3>Total</h3>
            <p>${{ total }} / month</p>
        </div>
    </div>
    <div class="col-md-offset-1 col-md-4">
        <h2 class="text-center">Order</h2>
        <p></p>
        <form method="post" action="orderverify">
            <input type="hidden" name="order" value="true">
            <div class="form-group">
                <label for="boxnum">Number of boxes</label>
                <input ng-model="boxNum" ng-change="update(boxNum, itemNum)" type="number" min="0" class="form-control" name="boxnum" id="boxnum" required="required">
            </div>
            <p>Sometimes not everything fits in a box. Do you have any extra items you would like stored? Think bicycles, minifridges, etc.</p>
            <div class="form-group">
                <label for="itemnum">Number of items</label>
                <input ng-model="itemNum" ng-change="update(boxNum, itemNum)" type="number" min="0" class="form-control" name="itemnum" id="itemnum" required="required">
            </div>
            <div class="form-group">
                <label for="deliverydate">Date of delivery</label>
                <input type="date" class="form-control date del" name="deliverydate" id="deliverydate" min="" required="required">
            </div>
            <p>Once your boxes are delivered, you can start packing! When would you like us to pick up the filled boxes?</p>
            <div class="form-group">
                <label for="pickupdate">Date of pickup</label>
                <input type="date" class="form-control date pickup" name="pickupdate" id="pickupdate" min="" required="required">
            </div>
            <p>What's the best approximate time for us to arrive?</p>
            <div class="form-group">
                <label for="pickupdate">Time of arrival</label><br>
                <input type="radio"  name="time" value="morning" checked="checked"> Morning<br>
                <input type="radio"  name="time" value="afternoon" > Afternoon<br>
                <input type="radio"  name="time" value="night" > Evening<br>
            </div>
            <p>What is the approximate date you'd like your boxes returned to you? Don't worry, this doesn't have to be exact.</p>
            <div class="form-group">
                <label for="pickupdate">Date of return</label>
                <input type="date" class="form-control" name="returndate" id="returndate" min="" required="required">
            </div>
            <p><input class="center-block btn btn-success" type="submit" name="submit" value="Order" required="required"></p>
            
        </form>
    </div>
</div>
<div class="spacer"></div>
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <p>If you have special requests or need more information, please <a href="mailto:info@vaultdstorage.com">email us</a>.</p>
            <p>We hope to have a form for requesting boxes back from storage available soon. In the meantime, if you would like to request back your stored boxes, please email us.</p>
            <p>Payment will be processed when we pick up your packed boxes.</p>
        </div>
    </div>
    <div class="spacer"></div>
<script type="text/javascript">
    function zeroPad(num) {
        if (num < 10) {
            return '0' + num;
        }
        return num;
    }
    function addDays(date, days) {
        var result = new Date(date);
        result.setDate(date.getDate() + days);
        return result;
    }
    var today = new Date();
    var tomorrow = addDays(today, 1);
    var dayAfter = addDays(today, 2);
    var twoWeeks = addDays(today, 15);
    console.log(today);
    console.log(tomorrow);
    console.log(dayAfter);
    console.log(twoWeeks);
    $('.del').attr({
        "min" : tomorrow.getFullYear() + "-" + zeroPad(tomorrow.getMonth() + 1) + "-" + zeroPad(tomorrow.getDate())
    });
    $('.pickup').attr({
        "min" : dayAfter.getFullYear() + "-" + zeroPad(dayAfter.getMonth() + 1) + "-" + zeroPad(dayAfter.getDate())
    });
    $('.del').attr({
        "value" : tomorrow.getFullYear() + "-" + zeroPad(tomorrow.getMonth() + 1) + "-" + zeroPad(tomorrow.getDate())
    });
    $('.pickup').attr({
        "value" : dayAfter.getFullYear() + "-" + zeroPad(dayAfter.getMonth() + 1) + "-" + zeroPad(dayAfter.getDate())
    });
    $('.pickup').attr("max", twoWeeks.getFullYear() + "-" + zeroPad(twoWeeks.getMonth() + 1) + "-" + zeroPad(twoWeeks.getDate()));

    $('.del').change(function() {
        var delivDate = new Date($('.del').val());
        var minPickDate = addDays(delivDate, 1);
        var pickDate = addDays(delivDate, 15);
        $('.pickup').attr("max", pickDate.getFullYear() + "-" + zeroPad(pickDate.getMonth() + 1) + "-" + zeroPad(pickDate.getDate()));
        $('.pickup').attr("min", minPickDate.getFullYear() + "-" + zeroPad(minPickDate.getMonth() + 1) + "-" + zeroPad(minPickDate.getDate()));
    });
</script>