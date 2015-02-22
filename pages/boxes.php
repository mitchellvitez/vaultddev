<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <h2 class="text-center">Boxes</h2>
        <p></p>
        <p class="text-center">You have &nbsp; <strong style="font-size: 200%">{{ boxes.length }}</strong> &nbsp; boxes stored with us.</p>
        <p class="text-center" ng-show="boxes.length < 1"><a href="order">Order some now</a></p>
        <div ng-repeat="box in boxes">
            <p class="boxcontainer">
                <div class="boxnumber text-center">{{$index + 1}}</div>
                <span class="boxdescription">{{box.description}}</span><!-- contenteditable="true" -->
            </p>
        </div>
    </div>
</div>
