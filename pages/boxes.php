<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <h2 class="text-center">My Storage</h2>
        <p></p>

        <h3 class="text-center" ng-show="pending">You have a pending order</h3>
        <p class = "text-center" ng-show="pending">Your order consists of {{ boxnum }} boxes and {{ itemnum }} items.</p>
        <p class = "text-center" ng-show="pending">Vaultd representative email: <a href="mailto:brett@vaultdstorage.com">brett@vaultdstorage.com</a></p>
        <div ng-show="pending" class="spacer"></div>
        
        <p class="text-center">You have &nbsp; <strong style="font-size: 200%">{{ boxes.length }}</strong> &nbsp; boxes stored with us.</p>
        <p class="text-center" ng-show="boxes.length < 1"><a href="order">Order some now</a></p>
        <div ng-repeat="box in boxes">
            <p class="boxcontainer">
                <div class="boxnumber text-center">{{$index + 1}}</div>
                <span class="boxdescription">{{box.description}}</span><!-- contenteditable="true" -->
            </p><br>
        </div>
        <br>

        <p class="text-center">You have &nbsp; <strong style="font-size: 200%">{{ items.length }}</strong> &nbsp; items stored with us.</p>
        <p class="text-center" ng-show="items.length < 1"><a href="order">Store some now</a></p>
        <div ng-repeat="item in items">
            <p class="boxcontainer">
                <div class="boxnumber text-center">{{$index + 1}}</div>
                <span class="boxdescription">{{item.description}}</span><!-- contenteditable="true" -->
            </p><br>
        </div>
    </div>
</div>
