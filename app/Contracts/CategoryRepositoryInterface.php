<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Contracts;


interface CategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function get();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function update($id);

}