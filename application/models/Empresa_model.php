<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Not Open Source Web Scheduler
 *
 * @author      B.Gautier <benja.gautier@gmail.com>
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * Empresa_Model Class
 *
 * Contains the database operations for the service provider users of Easy!Appointments.
 *
 * Data Structure:
 *      'name'
 *      'description'
 *
 * @package Models
 */
class Empresa_Model extends  CI_Model {

	/**
     * Add (insert - update) a empresa record.
     *
     * If the record already exists (id value provided) then it is going to be updated, otherwise inserted into the
     * database.
     *
     * @param array $empresa Contains the empresa data.
     *
     * @return int Returns the record id.
     *
     * @throws Exception When the record data validation fails.
     */
	public function add($empresa)
	{
		if($this->exists($empresa) && ! isset($empresa['id']))
		{
			$empresa['id'] = $this->find_record_id($empresa);
		}
		if( ! isset($empresa['id']))
		{
			$empresa['id'] = $this->_insert($empresa);
		}
		else
		{
			$empresa['id'] = $this->_update($empresa);
		}
		return (int)$empresa['id'];
	}

	/**
     * Check whether a particular empresa record already exists in the database.
     *
     * @param array $empresa Contains the empresa data. 
     *
     * @return bool Returns whether the provider record exists or not.
     *
     */
	public function exists($empresa)
	{
		// This method shouldn't depend on another method of this class.
        $num_rows = $this->db
            ->select('*')
            ->from('ea_empresas')
            ->where('ea_empresas.id', $empresa['id'])
            ->get()->num_rows();

        return ($num_rows > 0) ? TRUE : FALSE;
	}

	/**
     * Find the database record id of a empresa.
     *
     * @param array $empresa Contains the empresa data.
     *
     * @return int Returns the record id.
     *
     */
	public function find_record_id($empresa)
	{
        $result = $this->db
            ->select('ea_empresas.id')
            ->from('ea_empresas')
            ->get();

        if ($result->num_rows() == 0)
        {
            throw new Exception('Could not find empresa record id.');
        }

        return (int)$result->row()->id;
	}

	/**
     * Insert a new empresa record into the database.
     *
     * @param array $empresa Contains the empresa data (must be already validated).
     *
     * @return int Returns the new record id.
     *
     * @throws Exception When the insert operation fails.
     */
	public function _insert($empresa)
	{
		$this->load->helper('general');

        // Insert empresa record and save settings.
        if ( ! $this->db->insert('ea_empresas', $empresa))
        {
            throw new Exception('Could not insert empresa into the database');
        }

        $empresa['id'] = $this->db->insert_id();

        return (int)$empresa['id'];
	}

	public function _update($empresa)
	{
		$this->load->helper('general');

        // Update provider record.
        $this->db->where('id', $empresa['id']);
        if ( ! $this->db->update('ea_empresas', $empresa))
        {
            throw new Exception('Could not update provider record.');
        }
        return (int)$empresa['id'];
	}
}
