<?php

    require_once BASEPATH . 'lib/CI_Upload.php';


    /** 
     * Класс для загрузки файлов и изображений
     *
     * @author Zmi and GYL
     */
    class Uploader extends CI_Upload
    {
        const FORM_LOAD = 'enctype="multipart/form-data" method="post"';

        protected $thumbPaths = array();


        public function Upload($field, $config = array())
        {
            global $g_config;

            $finalConfig = $g_config['uploader']['default_config'];

            foreach($config as $k => $v)
            {
                $finalConfig[$k] = $v;
            }

            FileSys::MakeDir($finalConfig['upload_path']);
            $this->initialize($finalConfig);

            $ret = $this->do_upload($field);

            if ($ret && is_array($finalConfig['thumbs']))
            {
                $inf = $this->data();
                foreach ($finalConfig['thumbs'] as $v)
                {
                    $newDir = "";
                    if (!isset($v['path']))
                    {
                        $newDir = $finalConfig['upload_path'] . $v['width'] . '_' . $v['height'] . '/';
                    }
                    else
                    {
                        $newDir = $v['path'];
                    }

                    FileSys::MakeDir($newDir);
                    $image = WideImage::load($inf['full_path']);
                    $image->resize($v['width'], $v['height'])->saveToFile($newDir . $inf['file_name']);

                    $this->thumbPaths[] = $newDir . $inf['file_name'];
                }
            }

            return $ret;
        }

        public function HasUpload($field)
        {
            return isset($_FILES[$field]) && isset($_FILES[$field]["tmp_name"]) && $_FILES[$field]["tmp_name"];
        }

        public function Errors()
        {
            return $this->error_msg;
        }

        public function FileName()
        {
            $inf  = $this->data();
            return $inf['file_name'];
        }

    };


    /**
     * Небольшой класс-helper для удобного использования в сложных ситуациях
     *
     * @author Zmi and GYL
     */
    class UploaderEx extends Uploader
    {
        public function ThumbPathAt($index)
        {
            return $this->thumbPaths[$index];
        }

        public function FilePath()
        {
            $inf  = $this->data();
            return $inf['full_path'];
        }

        public function FileNameOrig()
        {
            $inf  = $this->data();
            return $inf['orig_name'];
        }

        public function FileNameNoExt()
        {
            $inf  = $this->data();
            return $inf['raw_name'];
        }

        public function FileDir()
        {
            $inf  = $this->data();
            return $inf['file_path'];
        }

        public function FileExt()
        {
            $inf  = $this->data();
            return $inf['file_ext'];
        }

        public function FileSize()
        {
            $inf  = $this->data();
            return $inf['file_size'];
        }

        public function IsImage()
        {
            $inf  = $this->data();
            return $inf['is_image'];
        }

        public function ImageWidth()
        {
            $inf  = $this->data();
            return $inf['image_width'];
        }

        public function ImageHeight()
        {
            $inf  = $this->data();
            return $inf['image_height'];
        }
    };
?>
