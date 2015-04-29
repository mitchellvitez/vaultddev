<div class="container">
    <div class="col-md-12">
        <h2 class="text-center">Items</h2>
        <p></p>
        <p class="text-center">Vaultd is tracking &nbsp; <strong style="font-size: 200%">{{ items.length }}</strong> &nbsp; items.</p>
        <table>
            <th>
                <td>User ID</td>
                <td>Description</td>
                <td>Status</td>
            </th>
            <tr ng-repeat="item in items" ng-class-odd="'greyback'">
                    <td><div class="boxnumber text-center" style=" /* width: 80px */ ">{{item.id}}</div></td>
                    <td>{{item.user_id}}</td>
                    <!-- <td>{{item.email}}</td> -->
                    <td>{{item.description}}</td>
                    <td>{{item.status}}</td>
        </table>
    </div>
</div>
<div class="spacer"></div>
