<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends Admin_Controller {

    /**
     * Constructor
     *
     * @access  public
     * @param   void
     *
     * @return  void
     **/
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('events');
    }

    // --------------------------------------------------------------------

    /**
     * Default method
     *
     * @access  public
     * @param   void
     *
     * @return  void
     **/
    public function index()
    {
        $data['events'] = Event::all();
        $this->document->build('events/admin/events_index', $data);
    }

    // --------------------------------------------------------------------

    /**
     * allow user to create/edit event record
     *
     * @access  public
     * @param   integer     $id     Event.id
     * @return  void
     **/
    public function edit($id = NULL)
    {
        $event = admin_edit_object('event', $id);

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_error_delimiters('', '');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'lang:event-field-title',
                'rules' => 'required'
            ),
            array(
                'field' => 'content',
                'label' => 'lang:event-field-content',
                'rules' => 'required'
            ),
            array(
                'field' => 'start-date',
                'label' => 'lang:event-field-start-date',
                'rules' => 'required'
            ),
            array(
                'field' => 'start-time',
                'label' => 'lang:event-field-start-time',
                'rules' => 'required'
            ),
            array(
                'field' => 'end-date',
                'label' => 'lang:event-field-end-date',
                'rules' => 'required'
            ),
            array(
                'field' => 'end-time',
                'label' => 'lang:event-field-end-time',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE)
        {
            if ($e = validation_errors())
            {
                set_status('error', $e);
            }
            $data['event'] = $event;
            //$data['categories'] = \Event\Category::all();
            $this->document->build('events/admin/event_edit', $data);
        }
        else
        {
            $event->title       = $this->input->post('title');
            $event->content     = $this->input->post('content');

            //if ( ! $category = \Event\Category::find_by_category($this->input->post('category')))
            //{
                //$category = Category::create(array(
                    //'category' => $this->input->post('category')
                //));
            //}
            //$event->category_id = $category->id;
            $event->start = date_create(
                $this->input->post('start-date') . ' ' .
                $this->input->post('start-time') . ' ' .
                $this->input->post('start-time-ampm'),
                new DateTimeZone(config_item('site_timezone'))
            );
            $event->end = date_create(
                $this->input->post('end-date') . ' ' .
                $this->input->post('end-time') . ' ' .
                $this->input->post('end-time-ampm'),
                new DateTimeZone(config_item('site_timezone'))
            );
            $event->end->setTimezone(new DateTimeZone('GMT'));
                // convert published datetime to GMT
            if ($this->input->post('publish-date'))
            {
                // convert published datetime to GMT
                $event->published_at = date_create(
                    $this->input->post('publish-date') . ' ' .
                    $this->input->post('publish-time') . ' ' .
                    $this->input->post('publish-time-ampm'),
                    new DateTimeZone(config_item('site_timezone'))
                );
                $event->published_at->setTimezone(new DateTimeZone('GMT'));
            }
            else if ( ! $event->is_published() && ! empty($event->published_at))
            {
                // clear published date if user emptied field
                $event->published_at = NULL;
            }

            if ( ! $event->save())
            {
                foreach ($event->errors->full_messages() as $e)
                {
                    set_status('error', $e);
                }
                redirect(uri_string());
            }

            set_status('success', 'Event Updated');
            redirect('admin/events');
        }
    }

    // --------------------------------------------------------------------

}
/* End of file articles.php */
/* Location: ./application/controllers/admin/articles.php */
