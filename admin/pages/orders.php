<div class="container">
   <!-- <div class="col-md-12"> -->
        <h2 class="text-center">Orders</h2>
        <p></p>
        <p class="text-center">Vaultd has &nbsp; <strong style="font-size: 200%">{{ orders.length }}</strong> &nbsp; orders.</p>
        <table>
            <tr>
                <td></td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Boxes</td>
                <td>Items</td>
                <td>Dropoff</td>
                <td>Time</td>
                <td>Pickup</td>
                <td>Status</td>
                <td>Payment</td>
                <td>Address</td>
                <td>City</td>
                <td>State</td>
                <!-- <td>Timestamp</td> -->
            </tr>
            <tr ng-repeat="order in orders" ng-class-odd="'greyback'">

                    <td><div class="boxnumber text-center">{{order.id}}</div></td>
                    <td>{{order.name}}</td>
                    <td>{{order.email}}</td>
                    <td>{{order.phone}}</td>
                    <td>{{order.box_num}}</td>
                    <td>{{order.item_num}}</td>
                    <td>{{order.delivery_date}}</td>
                    <td>{{order.time}}</td>
                    <td>{{order.pickup_date}}</td>
                    <td>{{order.status}}</td>
                    <td class="text-right">${{order.cash_received}}</td>
                    <td>{{order.address_line_1}}<br>{{order.address_line_2}}</td>
                    <td>{{order.city}}</td>
                    <td>{{order.state}}</td>
                    <!-- <td>{{order.timestamp}}</td> -->
        </table>
   <!-- </div> -->

<div class="spacer"></div>
</div>