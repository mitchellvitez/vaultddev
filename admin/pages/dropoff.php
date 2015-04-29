<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">Dropoff Form</h2>
        <p>Enter the box ids for each box you are dropping off, comma separated, and the user's email</p>
        <p>Example:<br>mitchell@vaultdstorage.com<br>1,355,52,7,23,34</p>
        <form action="email.php" method="post">
            <input type="hidden" name="type" value="dropoff">
            <p>email <input type="email" name="email"></p>
            <p>box IDs <input type="text" name="boxids"></p>
            <input class="center-block btn btn-success" type="submit" name="submit" value="submit" required="required">
        </form>
    </div>
</div>
