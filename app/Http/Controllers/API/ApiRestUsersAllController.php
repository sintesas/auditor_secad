<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Personal;

class ApiRestUsersAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        set_time_limit(1000);

        if($request->letraSearch != ''){
            $letra =  $request->letrSearch;
    
            try{
                $ldap_dn = "CN=AUDITOR PLUS,OU=Service Account,DC=FAC,DC=CO";
        
                $ldap_password = "@ud1t0RPlu4";
                
                $ldap_con = ldap_connect("172.20.101.108","389");
        
                if(ldap_bind($ldap_con, $ldap_dn, $ldap_password) or die("Conection faild!")) {
        
                    $result = ldap_search($ldap_con,"OU=OU_Usuarios,DC=FAC,DC=CO","(name=$letra*)") or die("No results found!");
                    $data = ldap_get_entries($ldap_con, $result);
                       
                    if ($data["count"] > 0)
                    {
                        $someArray = [];
                        
                        for ($i=0; $i<$data["count"]; $i++)
                        {
                            if (in_array("displayname", $data[$i])) {
                                if (in_array("mail", $data[$i])) {
                                    if (in_array("physicaldeliveryofficename", $data[$i])) {
                                        $arrayName = array('DisplayName' => $data[$i]["displayname"][0], 'Email'=> $data[$i]["mail"][0], 'Dependencia'=> $data[$i]["physicaldeliveryofficename"][0]);
                                        echo json_encode($arrayName);
                                    }else{
                                        $arrayName = array('DisplayName' => $data[$i]["displayname"][0], 'Email'=> $data[$i]["mail"][0]);
                                        echo json_encode($arrayName);                               
                                    }
                                }else{
                                    $arrayName = array('DisplayName' => $data[$i]["displayname"][0]);
                                    echo json_encode($arrayName);
                                }
                            }
                        }
                        
                    }else{
                        echo "No results found!";
                    }
    
    
                } else {
                    echo "Invalid user/pass or other errors!";
                }
            }catch(Exception $ex){
                echo "Conection faild!";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Personal::All();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function retrieves_users()
    {

        $dn        = 'ou=,dc=,dc=';
        $filter    = "(&(objectClass=user)(objectCategory=person)(sn=*))";

        $ldap_dn = "CN=AUDITOR PLUS,OU=Service Account,DC=FAC,DC=CO";
	
        $ldap_password = "@ud1t0RPlu4";
        
        $ldap_con = ldap_connect("172.20.101.108","389");

        if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $justthese = array();
            // enable pagination with a page size of 100.
            $pageSize = 100;

            $cookie = '';

            do {
                ldap_control_paged_result($ldap_con, $pageSize, true, $cookie);
    
                $result  = ldap_search($ldap_con, $dn, $filter, $justthese);
                $entries = ldap_get_entries($ldap_con, $result);
    
                if(!empty($entries)){
                    for ($i = 0; $i < $entries["count"]; $i++) {
                        $data['usersLdap'][] = array(
                                'name' => $entries[$i]["cn"][0],
                                'username' => $entries[$i]["userprincipalname"][0]
                        );
                    }
                }
                ldap_control_paged_result_response($ldap_con, $result, $cookie);
    
            } while($cookie !== null && $cookie != '');
    
            return $data;
        }
    }
}
