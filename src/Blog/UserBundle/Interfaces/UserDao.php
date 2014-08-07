<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 04.08.14
 * Time: 15:39
 */

namespace Blog\UserBundle\Interfaces;


interface UserDao
{

    function save($user);

    function load($id);

    function delete($id);

    function update($user);
}