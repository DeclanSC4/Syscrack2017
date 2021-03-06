<?php
namespace Framework\Database\Tables;

/**
 * Lewis Lancaster 2017
 *
 * Class Computers
 *
 * @package Framework\Database\Tables
 */

use Framework\Database\Table;

class Computers extends Table
{

    /**
     * Gets a computer by its ID
     *
     * @param $computerid
     *
     * @return mixed|null
     */

    public function getComputer( $computerid )
    {

        $array = array(
            'computerid' => $computerid
        );

        $result = $this->getTable()->where( $array )->get();

        return ( $result->isEmpty() ) ? null : $result[0];
    }

    /**
     * Gets all the computers by a user
     *
     * @param $userid
     *
     * @return \Illuminate\Support\Collection|null
     */

    public function getComputersByUser( $userid )
    {

        $array = array(
            'userid' => $userid
        );

        $result = $this->getTable()->where( $array )->get();

        return ( $result->isEmpty() ) ? null : $result;
    }

    /**
     * Gets a computer by their IP address
     *
     * @param $ipaddress
     *
     * @return mixed|null
     */

    public function getComputerByIPAddress( $ipaddress )
    {

        $array = array(
            'ipaddress' => $ipaddress
        );

        $result = $this->getTable()->where( $array )->get();

        return ( $result->isEmpty() ) ? null : $result[0];
    }

    /**
     * Gets a computer depending on its type ( NPC, Bank, Clan Server )
     *
     * @param $computertype
     *
     * @return mixed|null
     */

    public function getComputerByType( $computertype )
    {

        $array = array(
            'computertype' => $computertype
        );

        $result = $this->getTable()->where( $array )->get();

        return ( $result->isEmpty() ) ? null : $result[0];
    }

    /**
     * Inserts a computer
     *
     * @param $array
     *
     * @return int
     */

    public function insertComputer( $array )
    {

        return $this->getTable()->insertGetId( $array );
    }

    /**
     * Updates the computer
     *
     * @param $computerid
     *
     * @param $values
     */

    public function updateComputer( $computerid, $values )
    {

        $array = array(
            'computerid' => $computerid
        );

        $this->getTable()->where( $array )->update( $values );
    }
}