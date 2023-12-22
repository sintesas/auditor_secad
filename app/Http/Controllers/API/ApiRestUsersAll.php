<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UsersLDAP;

class ApiRestUsersAll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        if($request->search_user != ''){
            $letra =  $request->search_user;
            try{
                $ldap_dn = "CN=AUDITOR PLUS,OU=Service Account,DC=FAC,DC=CO";
        
                $ldap_password = "@ud1t0RPlu4";
                
                $ldap_con = ldap_connect("172.20.101.108","389");

                ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
                if(ldap_bind($ldap_con, $ldap_dn, $ldap_password) or exit("Conection faild!")) {
        
                    $result = ldap_search($ldap_con,"OU=OU_Usuarios,DC=FAC,DC=CO","(name=$letra*)") or exit("No results found!");
                    $data = ldap_get_entries($ldap_con, $result);
                       
                    if ($data["count"] > 0)
                    {
                        $someArray = [];
                        $dataResult = [];
                        
                        for ($i=0; $i<$data["count"]; $i++)
                        {
                            if (in_array("displayname", $data[$i])) {
                                if (in_array("mail", $data[$i])) {
                                    if (in_array("physicaldeliveryofficename", $data[$i])) {
                                        //$arrayName = array('DisplayName' => $data[$i]["displayname"][0], 'Email'=> $data[$i]["mail"][0], 'Dependencia'=> $data[$i]["physicaldeliveryofficename"][0]);
                                        //$someArray['DisplayName'][] = $data[$i]["displayname"][0];                                
                                        array_push($someArray, array('Id' => $i+1,'DisplayName' => $data[$i]["displayname"][0], 'Email'=> $data[$i]["mail"][0], 'Dependencia'=> $data[$i]["physicaldeliveryofficename"][0]));
                                        //echo json_encode($arrayName);

                                    }else{
                                        //$arrayName = array('DisplayName' => $data[$i]["displayname"][0], 'Email'=> $data[$i]["mail"][0]);
                                        array_push($someArray, array('Id' => $i+1,'DisplayName' => $data[$i]["displayname"][0], 'Email'=> $data[$i]["mail"][0], 'Dependencia'=> ""));
                                        //echo json_encode($arrayName);    
                                                             
                                    }
                                }else{
                                    //$arrayName = array('DisplayName' => $data[$i]["displayname"][0]);
                                    array_push($someArray, array('Id' => $i+1,'DisplayName' => $data[$i]["displayname"][0], 'Email'=> "", 'Dependencia'=> ""));
                                    //echo json_encode($arrayName);
                                    
                                }
                            }
                        }

                        $cantidadResult = count($someArray);
                        $cont = 1;

                        foreach ($someArray as $value) {

                            //Fecha Actual
                            $hoy = getdate();

                            $displayName=mb_convert_encoding($value['DisplayName'], 'UTF-8', 'ISO-8859-1');
                            $email=mb_convert_encoding($value['Email'], 'UTF-8', 'ISO-8859-1');
                            $dependencia=mb_convert_encoding($value['Dependencia'], 'UTF-8', 'ISO-8859-1');

                            $userExis = UsersLDAP::select('Name')
                                                        ->where('Name', 'like', \DB::raw('\'%'. $displayName . '\''))
                                                        ->get();
                            if(count($userExis) == 0){
                                $user = new UsersLDAP;

                                $user->Name = $displayName;
                                if($email == ''){
                                    $user->Email = 'N/A';
                                }else{
                                    $user->Email = $email;
                                }
                                
                                if($dependencia == ''){
                                    $user->Dependencia = 'N/A';
                                }else{
                                    $user->Dependencia = $dependencia;
                                }
                                
                                $user->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                                $user->save();
                            }else{
                                if($email == ''){
                                    $email = 'N/A';
                                }
                                if($dependencia == ''){
                                    $dependencia = 'N/A';
                                }
                                UsersLDAP::where('Name', 'like',DB::raw('\'%'. $displayName.'\''))
                                    ->update(['Name'=>$displayName,'Email'=>$email,'Dependencia'=>$dependencia,'Updated_at'=>$hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes']]);
                            }
                        }

                        return response()->json($someArray);

                    }else{
                        echo "No results found!";
                    }
    
    
                } else {
                    echo "Invalid user/pass or other errors!";
                }
            }catch(Exception $ex){
                echo "Conection faild!";
            }
        }else{
            echo '[{"search_user":null}]';
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
        //
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
}
