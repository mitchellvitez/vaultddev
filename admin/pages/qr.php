<div class="col-md-4 col-md-offset-2">
    <h2>QR Code Generator</h2>
    <p>Enter the user's email and the box ID and get a QR code.</p>
    <p>If it doesn't work, you probably made a tpyo.</p>
    <p>Leave the email empty to get a QR code for a box only.</p>
    <form>
        <p>email <input ng-model="email" ng-change="update(boxid, email)" type="text" name="email" style="width: 300px"></p>
        <p>box ID <input ng-model="boxid" ng-change="update(boxid, email)" type="number" min="0" name="boxid"></p>
    </form>
    <script src="js/jquery.qrcode-0.11.0.min.js"></script>
    
    <div class="spacer"></div>
    <p class="text-center">QR Code Contents</p>
    <p><pre>{{ contents }}</pre></p>
    <div class="spacer"></div>

    
</div>
<div class="col-md-4">
<div class="spacer"></div>
<div class="spacer"></div>
    <center style="height: 200px">
        <canvas width="200" height="200" id="canvas" style="display: none;"></canvas>
        <img id="canvasImg" download="{{ boxid }}">
    </center>
    
</div>

<script>
    
</script>