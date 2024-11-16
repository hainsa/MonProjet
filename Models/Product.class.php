<?php

    class Product{
        private $id;
        private $nom;
        private $prix;
        private $ref;
        private $img;

        function __construct($id,$n,$p,$r,$m){
            $this->id = $id;
            $this->nom = $n;
            $this->prix = $p;
            $this->ref= $r;
            $this->img = $m;
        }

        

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nom
         */
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         */
        public function setNom($nom): self
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prix
         */
        public function getPrix()
        {
                return $this->prix;
        }

        /**
         * Set the value of prix
         */
        public function setPrix($prix): self
        {
                $this->prix = $prix;

                return $this;
        }

        /**
         * Get the value of ref
         */
        public function getRef()
        {
                return $this->ref;
        }

        /**
         * Set the value of ref
         */
        public function setRef($ref): self
        {
                $this->ref = $ref;

                return $this;
        }

        /**
         * Get the value of img
         */
        public function getImg()
        {
                return $this->img;
        }

        /**
         * Set the value of img
         */
        public function setImg($img): self
        {
                $this->img = $img;

                return $this;
        }
    }