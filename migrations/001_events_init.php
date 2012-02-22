<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_events_init extends CI_Migration
{
    /**
     * add events table
     *
     * @access  public 
     * @param   void
     * 
     * @return void
     **/
    public function up()
    {
        $this->dbforge->add_field(array(
            'id'    => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'unsigned'      => TRUE,
                'auto_increment'    => TRUE
            ),
            'title' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '120',
            ),
            'slug' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '120',
            ),
            'content'   => array(
                'type'          => 'TEXT',
            ),
            'start'  => array(
                'type'          => 'DATETIME',
                'null'          => TRUE
            ),
            'end'  => array(
                'type'          => 'DATETIME',
                'null'          => TRUE
            ),
            'published_at'  => array(
                'type'          => 'DATETIME',
                'null'          => TRUE
            ),
            'created_at'  => array(
                'type'          => 'DATETIME',
                'null'          => TRUE
            ),
            'updated_at'  => array(
                'type'          => 'DATETIME',
                'null'          => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('events');
    }

    // --------------------------------------------------------------------

    /**
     * drop events table
     *
     * @access  public 
     * @param   void
     * 
     * @return void
     **/
    public function down()
    {
        $this->dbforge->drop_table('events');
    }
}

/* End of file 001_events_init.php */
/* Location: ./third_party/events/migrations/001_events_init.php */
