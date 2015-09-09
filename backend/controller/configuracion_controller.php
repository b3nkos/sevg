<?php

class Configuracion_controller extends Controller {

    private $_configuracion_model;

    public function __construct() {
        parent::__construct();
        $this->_configuracion_model = $this->load_model('configuracion_model');
    }

    public function index() {
        $this->_view->tittle = 'CONFIGURACION';
        $this->_view->renderizar('configuracion');
    }

    public function configuration_consult() {
        if ($this->validar_campos_vacios('table') == FALSE) {
            $this->_error[] = "El nombre es requerido";
        } else {
            echo json_encode($this->_configuracion_model->configuration_consult($_POST['table']));
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar el tipo de evento
    public function insertar_modificar_tipo_evento() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('tipo_evento')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('tipo_evento')));
                } else {
                    if ($this->_configuracion_model->validar('tipo_evento')) {
                        $this->_error[] = "El tipo de evento ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('tipo_evento')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('tipo_evento')) {
                    $this->_error[] = "El tipo de evento ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('tipo_evento')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar caracter de evento
    public function insertar_modificar_caracter_evento() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('caracter_evento')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('caracter_evento')));
                } else {
                    if ($this->_configuracion_model->validar('caracter_evento')) {
                        $this->_error[] = "El carácter de evento ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('caracter_evento')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('caracter_evento')) {
                    $this->_error[] = "El carácter de evento ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('caracter_evento')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar el ingreso al evento
    public function insertar_modificar_ingreso_evento() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('ingreso_evento')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('ingreso_evento')));
                } else {
                    if ($this->_configuracion_model->validar('ingreso_evento')) {
                        $this->_error[] = "El ingreso al evento ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('ingreso_evento')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('ingreso_evento')) {
                    $this->_error[] = "El ingreso al evento ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('ingreso_evento')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar el sistema control ingreso aforo
    public function insertar_modificar_sistema_control_ingreso_aforo() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('sistema_control_ingreso_aforo')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('sistema_control_ingreso_aforo')));
                } else {
                    if ($this->_configuracion_model->validar('sistema_control_ingreso_aforo')) {
                        $this->_error[] = "El sistema de control ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('sistema_control_ingreso_aforo')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('sistema_control_ingreso_aforo')) {
                    $this->_error[] = "El sistema de control ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('sistema_control_ingreso_aforo')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar la caracterizacion del evento
    public function insertar_modificar_caracterizacion_evento() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('caracterizacion_publico_participa')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('caracterizacion_publico_participa')));
                } else {
                    if ($this->_configuracion_model->validar('caracterizacion_publico_participa')) {
                        $this->_error[] = "La caracterización del publico ya está registrada";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('caracterizacion_publico_participa')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('caracterizacion_publico_participa')) {
                    $this->_error[] = "La caracterización del publico ya está registrada";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('caracterizacion_publico_participa')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar el lugar del evento
    public function insertar_modificar_lugar_evento() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('lugar_evento')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('lugar_evento')));
                } else {
                    if ($this->_configuracion_model->validar('lugar_evento')) {
                        $this->_error[] = "El lugar ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('lugar_evento')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('lugar_evento')) {
                    $this->_error[] = "El lugar ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('lugar_evento')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar el tipo de evento
    public function insertar_modificar_ubicacion_asistente() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('ubicacion_asistente')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('ubicacion_asistente')));
                } else {
                    if ($this->_configuracion_model->validar('ubicacion_asistente')) {
                        $this->_error[] = "La ubicación ya está registrada";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('ubicacion_asistente')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('ubicacion_asistente')) {
                    $this->_error[] = "La ubicación ya está registrada";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('ubicacion_asistente')));
                }
            }
        }
        $this->_error = NULL;
    }

    //Para insertar y modificar los cargos
    public function insertar_modificar_cargo() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('cargo')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('cargo')));
                } else {
                    if ($this->_configuracion_model->validar('cargo')) {
                        $this->_error[] = "El cargo ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('cargo')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('cargo')) {
                    $this->_error[] = "El cargo ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('cargo')));
                }
            }
        }
        $this->_error = NULL;
    }	

    //Para insertar y modificar los perfiles
    public function insertar_modificar_perfil() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('perfil')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('perfil')));
                } else {
                    if ($this->_configuracion_model->validar('perfil')) {
                        $this->_error[] = "El perfil ya está registrado";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('perfil')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('perfil')) {
                    $this->_error[] = "El perfil ya está registrado";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('perfil')));
                }
            }
        }
        $this->_error = NULL;
    }
    
    //Para insertar y modificar las presentaciones
    public function insertar_modificar_presentacion() {
        if (!$this->validar_campos_vacios('nombre')) {
            $this->_error[] = "El nombre es requerido";
        }
        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_configuracion_model->set_nombre($_POST['nombre']);
            $this->_configuracion_model->set_estado($_POST['estado']);
            if ($this->validar_campos_vacios('id')) {
                if ($this->_configuracion_model->validar_id_nombre('presentacion')) {
                    $this->_configuracion_model->set_id($_POST['id']);
                    echo json_encode(array('update' => $this->_configuracion_model->update_configuration('presentacion')));
                } else {
                    if ($this->_configuracion_model->validar('presentacion')) {
                        $this->_error[] = "La presentación ya esta registrada";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_configuracion_model->set_id($_POST['id']);
                        echo json_encode(array('update' => $this->_configuracion_model->update_configuration('presentacion')));
                    }
                }
            } else {
                if ($this->_configuracion_model->validar('presentacion')) {
                    $this->_error[] = "La presentación ya está registrada";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_configuracion_model->insert_configuration('presentacion')));
                }
            }
        }
        $this->_error = NULL;
    }

}

?>
