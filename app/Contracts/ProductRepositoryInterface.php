<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Contracts;


interface ProductRepositoryInterface
{
    /**
     * @param array $selected_fields
     * @param array $relations
     * @param bool $paginate
     * @return mixed
     */
    public function get(array $selected_fields,array $relations, bool $paginate);

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
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);
}