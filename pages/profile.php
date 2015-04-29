<?php session_start(); ?>
<div class="container">
    <div class="col-md-4">
        <h2 class="text-center">Profile</h2>
        <p></p>
        <p>Here you can manage your Vaultd account.</p>
        <p>The email associated with this account is <a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></p>
        <div class="spacer"></div>
        <p class="text-center"><a href="https://vaultdstorage.com/logoutverify" onclick="window.location.href = $(this).attr('href')">Log out</a></p>
    </div>

    <div class="col-md-4">
        <h3>Details</h3>
        <p>Name: {{user.name}}</p>
        <p>Phone: {{user.phone}}</p>
        <p>You {{ (user.email_update) ? "are" : "not"; }} currently receiving email updates</p>
    </div>

    <div class="col-md-4">
        <h3>Address</h3>
        <p>{{user.address_line_1}}</p>
        <p ng-show="user.address_line_2 !== '' ">{{user.address_line_2}}</p>
        <p>{{user.city}}, {{user.state}} {{user.zip}}</p>
    </div>

    <div class="col-md-4" ng-show="user.role == 'admin'">
        <h3>Congratulations!</h3>
        <p>You are an administrator. Head over to <a href="admin">the admin page</a> to do your duty</p>
    </div>


    <div class="col-md-4">
        <div class="spacer"></div>
        <label for="addressupdater">Show address update form</label> &nbsp; <input type="checkbox" id="addressupdater" name="addressupdater" ng-model="showAddressUpdate"/><br>
        <div ng-show="showAddressUpdate">
            <div class="spacer"></div>
            <form method="post" action="updateprofile">
                  <input type="hidden" name="updateprofile" id="updateprofile" value="true">
                  <input type="hidden" name="type" id="type" value="address">
                  <div class="form-group">
                    <label for="address1">Address</label>
                    <input type="text" class="form-control" name="address1" id="address1" placeholder="123 Main St." required="required">
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Apt. 314">
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Ann Arbor" required="required">
                  </div>
                  <div class="form-group">
                    <label for="zip">Zip code</label>
                    <input type="text" class="form-control" name="zip" id="zip" placeholder="00000" required="required">
                  </div>
                  <div class="form-group">
                    <label for="" or="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" placeholder="MI" required="required">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="USA" required="required">
                  </div>
                  <p><input class="center-block btn btn-success" type="submit" name="submit" value="Update address" required="required"></p>
            </form>
            <div class="spacer"></div>
        </div>

       <!-- <label for="phoneupdater">Show phone update form</label> &nbsp; <input type="checkbox" id="phoneupdater" name="phoneupdater" ng-model="showPhoneUpdate"/><br>
        <div ng-show="showPhoneUpdate">
            <div class="spacer"></div>
            <form method="post" action="updateprofile">
                <input type="hidden" name="updateprofile" id="updateprofile" value="true">
                <input type="hidden" name="type" id="type" value="phone">
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="867-5309" required="required">
                </div>
                <p><input class="center-block btn btn-success" type="submit" name="submit" value="Update phone number" required="required"></p>
            <div class="spacer"></div>
        </div> -->
    </div>


</div>
<div class="spacer"></div>
