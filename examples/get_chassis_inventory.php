<?php
include('Device.php');

# Create a Device, giving hostname, username and password
$d = new Device("hostname", "username", "password");

# Connect to the Device. This creates a NETCONF session over SSH
$d->connect();

# Execute an RPC, and get the reply.
$reply = $d->execute_rpc("get-chassis-inventory");

# The $reply obtained above is an XML object. We can use
# to_string() method to get the reply as a string, or we
# can use the get_owner_document() method to get the DomDocument
# object and use XPath to parse the XML. 

# To simply get the xml reply as a string, use the to_string() method
$reply_string = $reply->to_string();

# OR, to get the reply as a DomDocument object, 
# use get_owner_document() method
# We can then directly use tools like XPath to parse the DOM.
$reply_dom = $reply->get_owner_document();

# Close the device connection.
$d->close();
?>
