<?php 
    // include dataebase connection
    require_once('Database.php');
    // include query builder if you want to use it
    require_once('Query_builder.php');


    /* Model Class
     * Extend your Database class, so we can use $db variable (your database connection)
     */
    class Model extends Database
    {

        /* Constructor of this class
         * 
         */
            function __construct()
            {
                // load the constructor of Database class
                parent::__construct();
                
                // create object of query builder if you want to use it
                $this->qb = new Query_builder();
            }
        
        /* Owners
         * 
         */

            function view_owners()
            {
                /* using PDO
                 * you can directly use the $this->db ($this->db is public variable from Database class - db connection) 
                 * using fetchAll() - return multiple Rows, Multi Dimensional Array, so you need foreach statement to extract elements, then use index name 
                 * e.g. 
                 * foreach($data as $result){
                 *      echo $result['fname'];
                 * }
                 */

                //return $this->db->query("SELECT * FROM owners ORDER BY owner_id DESC")->fetchAll();

                /* or
                
                 * use Query Builder - this will make your program less code
                 * open Query_builder.php for more query functions
                 */
                return $this->qb->get('owners');
            }

            function view_filter_owners($column, $data)
            {
                $query = "SELECT * FROM owners WHERE $column LIKE '%$data%' ORDER BY owner_id DESC";

                /* using PDO
                 * you can directly use the $this->db ($this->db is public variable from Database class - db connection) 
                 * using fetchAll() - return multiple Rows, Multi Dimensional Array, so you need foreach statement to extract elements, then use index name 
                 * e.g. 
                 * foreach($data as $result){
                 *      echo $result['fname'];
                 * }
                 */
                //return $this->db->query($query)->fetchAll(); // uncomment this line if you want to use this approach

                /* or

                 * use Query Builder - this will make your program less code
                 * open Query_builder.php for more query functions
                 */
                return $this->qb->selectAll($query); // comment this line if you dont want to use query builder
            }

            function add_owner($full_name, $contact, $address)
            {
                /**********************************************/
                /*
                 * Bind String
                 * Manual Query
                 */
                //$query = "INSERT INTO owners (full_name,contact,address) VALUES (:full_name,:contact,:address)";
                //$bind = [
                //    ':full_name' => $full_name,
                //    ':contact' => $contact,
                //    ':address' => $address
                //];
                
                /*
                 * OR you can also use this approach
                 */
                //$query = "INSERT INTO owners (full_name,contact,address) VALUES (?,?,?)";
                //$bind = [ $full_name, $contact, $address ];

                /* using PDO ----------------------------------------------------------------
                 * you can directly use the $this->db ($this->db is public variable from Database class - db connection) 
                 */
                //return $this->db->prepare($query)
                //               ->execute($bind);

                /* or */
                /********************USING QUERY BUILDER**************************/
                
                /* use Query Builder - this will make your program less code
                 * open Query_builder.php for more query functions
                 */ 
                //how? insert(table,columns,param);
                // $param = [
                //     ':full_name' => $full_name,
                //     ':contact' => $contact,
                //     ':address' => $address
                // ];
                //or
                $param = [ $full_name, $contact, $address ];
                return $this->qb->insert('owners','full_name,contact,address', $param);
            }

            function get_owner_by_id($id)
            {
                $query = "SELECT * FROM owners WHERE owner_id = $id";

                /* using PDO
                 * you can directly use the $this->db ($this->db is public variable from Database class - db connection) 
                 * using fetch() - return Row, Single Array, so you dont need foreach statement to extract elements, just use index name 
                 * e.g. 
                 * echo $data['fname'];
                 */
                //return $this->db->query($query)->fetch(); // uncomment this line if you want to use this approach

                /* or

                 * use Query Builder - this will make your program less code
                 * open Query_builder.php for more query functions
                 * return Row, Single Array, so you dont need foreach statement to extract elements, just use index name (e.g. $data['fname'])
                 */
                return $this->qb->selectRow($query); // comment this line if you dont want to use query builder
            }

            function update_owner($id, $full_name, $contact, $address)
            {
                /**********************************************/
                /*
                 * Bind String
                 */
                // $query = "UPDATE owners SET full_name = :full_name, contact = :contact, address = :address WHERE owner_id = $id";
                // $bind = [
                //     ':full_name' => $full_name,
                //     ':contact' => $contact,
                //     ':address' => $address
                // ];
                /*
                 * OR you can also use this approach
                 */
                //$query = "UPDATE owners SET full_name = ?, contact = ?, address = ? WHERE owner_id = $id";
                //$bind = [ $full_name, $contact, $address ];

                /* using PDO --------------------------------------------------------------------------
                 * you can directly use the $this->db ($this->db is public variable from Database class - db connection) 
                 */  
                //return $this->db->prepare($query)
                //               ->execute($bind);

                /* or */
                /***********************QUERY BUILDER***********************/
                
                /* use Query Builder - this will make your program less code
                 * open Query_builder.php for more query functions
                 */
                //how? update(table,columns, params, where clause);
                $params = [
                    ':full_name' => $full_name,
                    ':contact' => $contact,
                    ':address' => $address
                ];
                
                // or
                // $params = [ $full_name, $contact, $address ];
                return $this->qb->update('owners',['full_name','contact','address'] ,$params, "owner_id=$id");
            }

        /* Pigs
         * 
         */

            function view_pigs()
            {
                $query = "SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id ORDER BY pigs.pig_id DESC";
                return $this->db->query($query)->fetchAll();
            }

            function view_filter_pigs($column, $data)
            {
                $query = "SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE $column LIKE '%$data%' ORDER BY pigs.pig_id DESC";
                return $this->db->query($query)->fetchAll();
            }

            function add_pig($owner_id, $nurture_batch_name, $no_of_pig, $amount_per_pig, $date_buy)
            {
                $total_amount = $no_of_pig * $amount_per_pig;

                $query = "INSERT INTO pigs (owner_id, nurture_batch_name, no_of_pig, amount_per_pig, total_amount, date_buy) VALUES (:owner_id, :nurture_batch_name, :no_of_pig, :amount_per_pig, :total_amount, :date_buy)";

                $bind_param = array(
                    ':owner_id' => $owner_id, 
                    ':nurture_batch_name' => $nurture_batch_name, 
                    ':no_of_pig' => $no_of_pig, 
                    ':amount_per_pig' => $amount_per_pig, 
                    ':total_amount' => $total_amount, 
                    ':date_buy' => $date_buy
                );

                return $this->db->prepare($query)
                            ->execute($bind_param);
            }

            function get_pig_by_id($id)
            {
                $query = "SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE pig_id = $id";
                return $this->db->query($query)
                                ->fetch();
            }


        /* Capitals
         * 
         */

            function view_pigs_select($status)
            {
                $query = "SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE pigs.status = '$status' ORDER BY pigs.pig_id DESC";
                return $this->db->query($query)->fetchAll();
            }

            function add_capital($pig_id, $capital_amount, $description, $date_posted)
            {
                $query = "INSERT INTO capitals (pig_id, capital_amount, description, date_posted) VALUES (?,?,?,?)";

                $bind_param = array($pig_id, $capital_amount, $description, $date_posted);

                return $this->db->prepare($query)
                            ->execute($bind_param);
            }

            function view_capitals()
            {
                $query = "SELECT * FROM capitals INNER JOIN pigs ON pigs.pig_id = capitals.pig_id INNER JOIN owners ON pigs.owner_id = owners.owner_id ORDER BY capitals.capital_id DESC";
                return $this->db->query($query)->fetchAll();
            }

            function view_filter_capitals($column, $data)
            {
                $query = "SELECT * FROM capitals INNER JOIN pigs ON pigs.pig_id = capitals.pig_id INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE $column LIKE '%$data%' ORDER BY capitals.capital_id DESC";
                return $this->db->query($query)->fetchAll();
            }

        /* Expenses
         * 
         */

            function add_expenses($pig_id, $exp_description, $exp_remarks, $exp_item_amount, $exp_item_count, $date_purchaised, $fare_per_item)
            {
                $query = "INSERT INTO expenses (pig_id, exp_description, exp_remarks, exp_item_amount, exp_item_count, date_purchaised, fare_per_item, exp_total_amount, fare_total) VALUES (?,?,?,?,?,?,?,?,?)";

                $exp_total_amount = $exp_item_amount * $exp_item_count;

                if($fare_per_item=="" || $fare_per_item==null){
                    $fare_total = 0;
                    $fare_per_item = 0;
                }else{
                    $fare_total = $fare_per_item * $exp_item_count;
                }
                
                $bind_param = array($pig_id, $exp_description, $exp_remarks, $exp_item_amount, $exp_item_count, $date_purchaised, $fare_per_item, $exp_total_amount, $fare_total);

                return $this->db->prepare($query)
                            ->execute($bind_param);
            }

            function view_expenses()
            {
                $query = "SELECT * FROM expenses INNER JOIN pigs ON pigs.pig_id = expenses.pig_id INNER JOIN owners ON pigs.owner_id = owners.owner_id ORDER BY expenses.exp_id DESC";
                return $this->db->query($query)->fetchAll();
            }

            function view_filter_expenses($column, $data)
            {
                $query = "SELECT * FROM expenses INNER JOIN pigs ON pigs.pig_id = expenses.pig_id INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE $column LIKE '%$data%' ORDER BY expenses.exp_id DESC";
                return $this->db->query($query)->fetchAll();
            }





        /* Sales
         * 
         */

            function view_pig_select_and_check_noofpig_sale($status)
            {
                $query = "SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE pigs.status = '$status' ORDER BY pigs.pig_id DESC";
                $pigs = $this->db->query($query)->fetchAll();

                $data = [];
                foreach($pigs as $pig)
                {
                    $select = [];
                    $sales = $this->db->query('SELECT count(*) as co FROM sales where pig_id = '.$pig['pig_id'])->fetch();
                    
                    array_push($select, $sales['co'] + 1);
                    array_push($select, $pig['pig_id']);
                    array_push($select, $pig['nurture_batch_name']);
                    array_push($select, $pig['no_of_pig']);
                    array_push($select, $pig['full_name']);
                    
                    array_push($data, $select);
                }
                return $data;
            }

            function add_sales($pig_id, $pig_no, $kilogram, $amount, $date_sold)
            {
                $query = "INSERT INTO sales (pig_id, pig_no, kilogram, amount, date_sold, total_amount) VALUES (?,?,?,?,?,?)";

                $total_amount = $kilogram * $amount;
                
                $bind_param = array($pig_id, $pig_no, $kilogram, $amount, $date_sold, $total_amount);

                return $this->db->prepare($query)
                            ->execute($bind_param);
            }

            function view_sales()
            {
                $query = "SELECT *, sales.total_amount as total, sales.date_sold as date FROM sales INNER JOIN pigs ON pigs.pig_id = sales.pig_id INNER JOIN owners ON pigs.owner_id = owners.owner_id ORDER BY sales.sale_id DESC";
                return $this->db->query($query)->fetchAll();
            }

            function view_filter_sales($column, $data)
            {
                $query = "SELECT *, sales.total_amount as total, sales.date_sold as date FROM sales INNER JOIN pigs ON pigs.pig_id = sales.pig_id INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE $column LIKE '%$data%' ORDER BY sales.sale_id DESC";
                return $this->db->query($query)->fetchAll();
            }

        

        /* Reports
         * 
         */

            function view_report()
            {
                $pigs = $this->db->query('SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id ORDER BY pigs.pig_id DESC')->fetchAll();
                $data = array();
                foreach($pigs as $pig)
                {
                    $all = [];
                    //Owner
                    array_push($all, $pig['full_name']);
                    array_push($all, $pig['nurture_batch_name']);//Pigs | Batch Name
                    array_push($all, $pig['no_of_pig']);//No. of Pigs
                    array_push($all, $pig['status']);//Status
                    array_push($all, $pig['date_buy']);//Date Started

                    $capitals = $this->db->query('SELECT sum(capital_amount) as cap FROM capitals WHERE pig_id = '.$pig['pig_id'])->fetch();

                    array_push($all, $capitals['cap']);//Total Capitals
                    
                    array_push($all, $pig['total_amount']);//Piglets expenses amount

                    $expenses = $this->db->query('SELECT sum(exp_total_amount + fare_total) as expe FROM expenses WHERE pig_id = '.$pig['pig_id'])->fetch();

                    array_push($all, $expenses['expe']);//Feeds & Other expenses

                    $balance = $capitals['cap'] - $expenses['expe'] - $pig['total_amount'];
                    array_push($all, $balance);//Capital Balanced

                    $sold_pigs = $this->db->query('SELECT count(pig_no) as sol FROM sales WHERE pig_id = '.$pig['pig_id'])->fetch();

                    array_push($all, $sold_pigs['sol']);//Sold pigs

                    $sales = $this->db->query('SELECT sum(total_amount) as sale FROM sales WHERE pig_id = '.$pig['pig_id'])->fetch();
                    
                    array_push($all, $sales['sale']);//Sold Amount

                    array_push($all, $pig['date_sold']);//Date Sold

                    array_push($all, $sales['sale'] - $expenses['expe'] - $pig['total_amount']);//Net amount

                    array_push($data,$all);
                }
                return $data;
            }

            function view_filter_report($column, $data)
            {
                $query = "SELECT * FROM pigs INNER JOIN owners ON pigs.owner_id = owners.owner_id WHERE $column LIKE '%$data%' ORDER BY pigs.pig_id DESC";
                $pigs = $this->db->query($query)->fetchAll();
                $data = array();
                foreach($pigs as $pig)
                {
                    $all = [];
                    //Owner
                    array_push($all, $pig['full_name']);
                    array_push($all, $pig['nurture_batch_name']);//Pigs | Batch Name
                    array_push($all, $pig['no_of_pig']);//No. of Pigs
                    array_push($all, $pig['status']);//Status
                    array_push($all, $pig['date_buy']);//Date Started

                    $capitals = $this->db->query('SELECT sum(capital_amount) as cap FROM capitals WHERE pig_id = '.$pig['pig_id'])->fetch();

                    array_push($all, $capitals['cap']);//Total Capitals
                    
                    array_push($all, $pig['total_amount']);//Piglets expenses amount

                    $expenses = $this->db->query('SELECT sum(exp_total_amount + fare_total) as expe FROM expenses WHERE pig_id = '.$pig['pig_id'])->fetch();

                    array_push($all, $expenses['expe']);//Feeds & Other expenses

                    $balance = $capitals['cap'] - $expenses['expe'] - $pig['total_amount'];
                    array_push($all, $balance);//Capital Balanced

                    $sold_pigs = $this->db->query('SELECT count(pig_no) as sol FROM sales WHERE pig_id = '.$pig['pig_id'])->fetch();

                    array_push($all, $sold_pigs['sol']);//Sold pigs

                    $sales = $this->db->query('SELECT sum(total_amount) as sale FROM sales WHERE pig_id = '.$pig['pig_id'])->fetch();
                    
                    array_push($all, $sales['sale']);//Sold Amount

                    array_push($all, $pig['date_sold']);//Date Sold

                    array_push($all, $sales['sale'] - $expenses['expe'] - $pig['total_amount']);//Net amount

                    array_push($data,$all);
                }
                return $data;
            }


        /* Login
         * 
         */
            function check($username,$password)
            {
                $password = sha1(md5($password));

                // call the $db public variable of Database class 
                $con = $this->db;

                $query = "SELECT * from user WHERE username='".$username."' && password='".$password."'";
                // use the $con to process your query
                $result = $con->query($query)
                            ->fetch();
                return $result;
            }

        /* Create account
         * 
         */
            function signup($username,$password)
            {
                $password = sha1(md5($password));
                
                // you can directly use the $this->db ($this->db is public variable from extended Database class - db connection)
                $result = $this->db->prepare("INSERT INTO login (username,password) VALUES (?,?)")
                            ->execute([$username,$password]);
                return $result;
            }

        /* User
         * 
         */

            function user_settings($username, $password, $new_pass)
            {
                $password = sha1(md5($password));
                $new_pass = sha1(md5($new_pass));

                return $this->db->prepare("UPDATE user set password=? WHERE username=$username")
                            ->execute([$new_pass]);
            }



    }
    
?>