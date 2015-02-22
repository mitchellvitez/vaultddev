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
    var dt = new Date();
    $('.del').attr({
        "min" : dt.getFullYear() + "-" + zeroPad(dt.getMonth() + 1) + "-" + zeroPad(dt.getDate() + 1)
    });
    $('.pickup').attr({
        "min" : dt.getFullYear() + "-" + zeroPad(dt.getMonth() + 1) + "-" + zeroPad(dt.getDate() + 2)
    });
    $('.del').attr({
        "value" : dt.getFullYear() + "-" + zeroPad(dt.getMonth() + 1) + "-" + zeroPad(dt.getDate() + 1)
    });
    $('.pickup').attr({
        "value" : dt.getFullYear() + "-" + zeroPad(dt.getMonth() + 1) + "-" + zeroPad(dt.getDate() + 2)
    });
</script>