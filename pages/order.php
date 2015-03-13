<div class="container">
    <div class="col-md-offset-4 col-md-4">
        <h2 class="text-center">Order</h2>
        <p></p>
        <form method="post" action="orderverify">
            <input type="hidden" name="order" value="true">
            <div class="form-group">
                <label for="boxnum">Number of boxes</label>
                <input type="number" min="1" class="form-control" name="boxnum" id="boxnum" required="required">
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
            <p><input class="center-block btn btn-success" type="submit" name="submit" value="Order" required="required"></p>
        </form>
    </div>
</div>
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