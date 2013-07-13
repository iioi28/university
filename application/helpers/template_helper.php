<?php
 //Page header
if(!function_exists('putHeader'))
{
    function putHeader()
    { 
        $ci = &get_instance();
        return $ci->load->view('main/header');
    }
}
  
//load footer
if(!function_exists('putFooter'))
{
    function putFooter()
    {
        $ci = &get_instance();
        $footers        = $ci->static_model->getData('footer','en');
        $data['footer'] = $footers;
        return $ci->load->view('template/footer',$data); 
    }
}
//load Menu
if(!function_exists('putMenu'))
{
    function putMenu()
    {
        $ci = &get_instance();
        $ci->load->model('static/static_model');
        $menus      = $ci->static_model->getData('menu','en');
        $categories = $ci->static_model->getData('category','en');
        $data['menu']       = $menus;
        $data['category']   = $categories;
        return $ci->load->view('template/menu',$data); 
    }
}
//load footer
if(!function_exists('putSlide'))
{
    function putSlide()
    {
        $ci = &get_instance();
        return $ci->load->view('template/slides');  
    }
}
 
//left tpl
if(!function_exists('putLeft'))
{
    function putLeft()
    {
        $ci = &get_instance();
  	/*
        $ci->load->model('static/static_model');
        $categories = $ci->static_model->getData('category','en');
        $publishers = $ci->static_model->getData('publisher','en');
        $data['category']   = $categories;
        $data['publisher']  = $publishers;
		 */
        return $ci->load->view('main/left');
    }
}

//left tpl
if(!function_exists('putRight'))
{
    function putRight()
    {
        $ci = &get_instance();
        $ci->load->model('books/books_model');
        $records = $ci->books_model->getBooks();
        $data['books'] = $records;
        return $ci->load->view('template/right',$data);
    }
}

//Bring content to view
if(!function_exists('putContent'))
{
    function putContent($content='')
    {  
        //load header file
        $ci = &get_instance(); 
        if(!empty($content))
        {
            //provide left banner
            $data['content'] = $content; 
            $ci->load->view('main/content',$data);
        }
        else
        {
            //provide left banner
            $data['content'] = "";
            $ci->load->view('main/content',$data);
        }
    }
}

//Dynamically add Javascript files to header page
if(!function_exists('add_js')){
    function add_js($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_js  = $ci->config->item('header_js');
        
        if(empty($file)){
            return;
        }
        
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js',$header_js);
        }else{
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js',$header_js);
        }
    }
}

//Dynamically add CSS files to header page
if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        
        if(empty($file)){
            return;
        }
        
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css',$header_css);
        }
    }
}

if(!function_exists('put_headers')){
    function put_headers()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        $header_js  = $ci->config->item('header_js');
        
        foreach($header_css AS $item){
            $str .= '<link rel="stylesheet" href="'.base_url().'css/'.$item.'" type="text/css" />'."\n";
        }
        
        foreach($header_js AS $item){
            $str .= '<script type="text/javascript" src="'.base_url().'js/'.$item.'"></script>'."\n";
        }
        
        return $str;
    }
}
