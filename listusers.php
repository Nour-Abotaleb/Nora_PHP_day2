<table width=100% border=1px solid>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Address</td>
            <td>Country</td>
            <td>Gender</td>
            <td>Skills</td>
            <td>Username</td>
            <td>Password</td>
            <td>Department</td>
            <td>Options</td>
        </tr>
        <?php
try
{
    $users=fopen('users.txt','r');
    while(!feof($users))
    {
        $data=fgets($users);
        $data=preg_split('/\,/',$data); 
        // var_dump($data);
        ?>
        <tr>
            <?php for($i=0;$i<count($data);$i++){ ?>
            <td>
                <?php echo $data[$i]; ?>
            </td>
            <?php }?>
            
            <td>
                <button type="submit">Update</button>
                <button type="submit">Delete</button>
                <button type="submit">Show Details</button>
            </td>
    </tr>
        
        <?php
    }
    fclose($users);
}
catch(Exception $ex)
{
    echo 'error';
}
?>
</table>