<?php 

function authAdmin ( $page ) {
    if( $page !== 'admin' ){
        return false;
        exit;
    } else {
        return true;
        exit;
    }
}

function authResearcher( $page ){
    if( $page !== 'researcher' ){
        return false;
        exit;
    } else {
        return true;
        exit;
    }
}

function authStudent( $page ){
    if( $page !== 'user' ){
        return false;
        exit;
    } else {
        return true;
        exit;
    }
}