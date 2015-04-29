<div class="container">
    <div class="col-md-12">
        <h2 class="text-center">Boxes</h2>
        <p></p>
        <p class="text-center">Vaultd has &nbsp; <strong style="font-size: 200%">{{ boxes.length }}</strong> &nbsp; boxes.</p>
        <table>
            <th>
                <td>User ID</td>
                <td>Description</td>
                <td>Status</td>
            </th>
            <tr ng-repeat="box in boxes" ng-class-odd="'greyback'">
                    <td><div class="boxnumber text-center" style="width: 80px">{{box.id}}</div></td>
                    <td>{{box.user_id}}</td>
                    <!-- <td>{{box.email}}</td> -->
                    <td>{{box.description}}</td>
                    <td>{{box.status}}</td>
        </table>
    </div>
</div>
<div class="spacer"></div>
