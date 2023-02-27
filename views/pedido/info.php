<h1>Shipment information</h1>

<form action="<?=base_url?>pedido/save" method="post">
    
    <label for="state">State</label>
    <input type="text" name="state" required/>
    
    <label for="city">City</label>
    <input type="text" name="city" required/>
    
    <label for="address">Address</label>
    <input type="text" name="address" required/>
    
    <input type="submit" value="Make Order">



</form>