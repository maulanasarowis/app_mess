<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('email')) {
        redirect('C_auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('users_menu', ['menu' => $menu])->row_array();
        $id_menu = $queryMenu['id'];

        $userAccess = $ci->db->get_where('users_access_menu', [
            'role_id' => $role_id,
            'id_menu' => $id_menu
        ]);


        if($userAccess->num_rows() < 1 ) {
            redirect('C_auth/blocked');
        }
    }
}