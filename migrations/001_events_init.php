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
        $this->add_events();
        $this->add_categories();
    }

    // --------------------------------------------------------------------

    /**
     * add_events
     *
     * @access  public
     *
     * @return void
     **/
    public function add_events()
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
            'category_id' => array(
                'type'              => 'INT',
                'constraint'        => '11',
                'unsigned'          => TRUE,
                'null'              => TRUE
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
     * add_categories
     *
     * @access  public
     *
     * @return void
     **/
    public function add_categories()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => '11',
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ),
            'category' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '50',
                'null'              => FALSE,
            ),
            'slug' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '120',
            ),
            'parent_category_id' => array(
                'type'              => 'INT',
                'constraint'        => '11',
                'unsigned'          => TRUE,
                'null'              => TRUE,
            ),
        ));
        $this->dbforge->add_key('id',TRUE);
        $this->dbforge->create_table('event_categories');
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
        $this->dbforge->drop_table('event_categories');
    }
}

/* End of file 001_events_init.php */
/* Location: ./third_party/events/migrations/001_events_init.php */
