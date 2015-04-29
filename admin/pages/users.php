<div class="container">
    <div class="col-md-12">
        <h2 class="text-center">Users</h2>
        <p></p>
        <p class="text-center">Vaultd has &nbsp; <strong style="font-size: 200%">{{ users.length }}</strong> &nbsp; users.</p>
        <table>
            <tr ng-repeat="user in users" ng-class-odd="'greyback'">

        <td ng-show="user.role === 'admin'"><div class="boxnumber text-center" style="background-color: #FF3519">{{user.id}}</td>
        <td ng-hide="user.role === 'admin'"><div class="boxnumber text-center">{{user.id}}</td>
    
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{ user.phone }}</td>
                    <td>{{ user.address_line_1 }}</td>
                    <td>{{ user.address_line_2 }}</td>
                    <td>{{ user.city }}</td>
                    <td>{{ user.state }}</td>
                    <td>{{ user.country }}</td>
                    <td ng-show="user.email_update">&nbsp;&nbsp;&nbsp;&#10004;</td>
            </tr>
        </table>
    </div>
</div>
<div class="spacer"></div>
