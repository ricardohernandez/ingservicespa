<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CddModel extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function insertarVisita($data){
		if($this->db->insert('aplicaciones_visitas', $data)){
			return TRUE;
		}
		return FALSE;
	}


/*********CDD**************/

	public function listaCdd($desde,$hasta,$region,$comuna){
		$this->db->select("SHA1(cd.id) as 'hash_id',
			cd.id as id,
			cd.nombre_proyecto as nombre_proyecto,
			cd.id_region as id_region,
			cd.id_comuna as id_comuna,
			cd.id_tipo as id_tipo,
			cd.ot as ot,
			cd.num_proyecto as num_proyecto,
			cd.ingeniero as ingeniero,
			if(cd.fecha_asignacion!='1970-01-01' and cd.fecha_asignacion!='0000-00-00',cd.fecha_asignacion,'') as 'fecha_asignacion',
			if(cd.hora_asignacion!='00:00:00', SUBSTR(cd.hora_asignacion,1,5),'') as 'hora_asignacion',
			if(cd.fecha_entrega_prog!='1970-01-01' and cd.fecha_entrega_prog!='0000-00-00',cd.fecha_entrega_prog,'') as 'fecha_entrega_prog',
			cd.id_relevador as id_relevador,
			if(cd.fecha_relevador!='1970-01-01' and cd.fecha_relevador!='0000-00-00',cd.fecha_relevador,'') as 'fecha_relevador',
	        cd.id_dibujante as id_dibujante,
	        cd.id_disenador_fo as id_disenador_fo,
	        cd.id_disenador_rf as id_disenador_rf,
	        cd.id_estado as id_estado,
			if(cd.fecha_entrega_real!='1970-01-01' and cd.fecha_entrega_real!='0000-00-00',cd.fecha_entrega_real,'') as 'fecha_entrega_real',
			if(cd.hora_entrega_real!='00:00:00', SUBSTR(cd.hora_entrega_real,1,5),'') as 'hora_entrega_real',
	        cd.n_emision_cobro as n_emision_cobro,
	        cd.observaciones_trabajos as observaciones_trabajos,
	        cd.observaciones as observaciones,
			if(cd.fecha_cierre_informe!='1970-01-01' and cd.fecha_cierre_informe!='0000-00-00',cd.fecha_cierre_informe,'') as 'fecha_cierre_informe',
	     	if(cd.factor_cobro!='',cd.factor_cobro,'') as 'factor_cobro',
	     	if(cd.valor_uf!='',cd.valor_uf,'') as 'valor_uf',
	     	if(cd.valor_uf_total!='',cd.valor_uf_total,'') as 'valor_uf_total',
	     	if(cd.valor_total_peso!='',cd.valor_total_peso,'') as 'valor_total_peso',
	     	if(cd.registro_fecha!='1970-01-01' and cd.registro_fecha!='0000-00-00',cd.registro_fecha,'') as 'registro_fecha',
	      	if(cd.registro_hora!='00:00:00', SUBSTR(cd.registro_hora,1,5),'') as 'registro_hora',
	        cd.factura_numero as factura_numero,
			if(cd.factura_fecha!='1970-01-01' and cd.factura_fecha!='0000-00-00',cd.factura_fecha,'') as 'factura_fecha',
	      	if(cd.factura_valor!=0,cd.factura_valor,'') as 'factura_valor',
	        cd.id_digitador as id_digitador,
	        cd.ultima_actualizacion as ultima_actualizacion,

	        cdc.comuna as comuna,
	        cdc.factor_por_zona as factor_por_zona,
	        cdr.region as region,
	        cde.estado as estado,
	        cdt.tipo as tipo,
			
			CONCAT(u.primer_nombre,' ',u.apellido_paterno) as 'relevador',
			CONCAT(u2.primer_nombre,' ',u2.apellido_paterno) as 'dibujante',
			CONCAT(u3.primer_nombre,' ',u3.apellido_paterno) as 'disenador_fo',
			CONCAT(u4.primer_nombre,' ',u4.apellido_paterno) as 'disenador_rf',
			CONCAT(u5.primer_nombre,' ',u5.apellido_paterno) as 'digitador'

			");
						

		$this->db->from('cdd as cd');
		$this->db->join('cdd_comunas as cdc', 'cdc.id = cd.id_comuna', 'left');
		$this->db->join('cdd_regiones as cdr', 'cdr.id = cd.id_region', 'left');
		$this->db->join('cdd_tipos as cdt', 'cdt.id = cd.id_tipo', 'left');
		$this->db->join('cdd_estados as cde', 'cde.id = cd.id_estado', 'left');

		$this->db->join('usuario as u', 'u.id = cd.id_relevador', 'left');
		$this->db->join('usuario as u2', 'u2.id = cd.id_dibujante', 'left');
		$this->db->join('usuario as u3', 'u3.id = cd.id_disenador_fo', 'left');
		$this->db->join('usuario as u4', 'u4.id = cd.id_disenador_rf', 'left');
		$this->db->join('usuario as u5', 'u5.id = cd.id_digitador', 'left');

		if($desde!="" and $hasta!=""){
			$this->db->where("cd.fecha_asignacion BETWEEN '".$desde."' AND '".$hasta."'");	
		}

		if($region!=""){
			$this->db->where('cd.id_region', $region);
		}

		if($comuna!=""){
			$this->db->where('cd.id_comuna', $comuna);
		}

		$res=$this->db->get();
		if($res->num_rows()>0){
			return $res->result_array();
		}
		return FALSE;
	}

	public function getCddData($hash){
		$this->db->select("SHA1(cd.id) as 'hash_id',
			cd.nombre_proyecto as nombre_proyecto,
			cd.id as id,
			cd.id_region as id_region,
			cd.id_comuna as id_comuna,
			cd.id_tipo as id_tipo,
			cd.ot as ot,
			cd.num_proyecto as num_proyecto,
			cd.ingeniero as ingeniero,
			if(cd.fecha_asignacion!='1970-01-01' and cd.fecha_asignacion!='0000-00-00',cd.fecha_asignacion,'') as 'fecha_asignacion',
			if(cd.hora_asignacion!='00:00:00', SUBSTR(cd.hora_asignacion,1,5),'') as 'hora_asignacion',
			if(cd.fecha_entrega_prog!='1970-01-01' and cd.fecha_entrega_prog!='0000-00-00',cd.fecha_entrega_prog,'') as 'fecha_entrega_prog',
			cd.id_relevador as id_relevador,
			if(cd.fecha_relevador!='1970-01-01' and cd.fecha_relevador!='0000-00-00',cd.fecha_relevador,'') as 'fecha_relevador',
	        cd.id_dibujante as id_dibujante,
	        cd.id_disenador_fo as id_disenador_fo,
	        cd.id_disenador_rf as id_disenador_rf,
	        cd.id_estado as id_estado,
			if(cd.fecha_entrega_real!='1970-01-01' and cd.fecha_entrega_real!='0000-00-00',cd.fecha_entrega_real,'') as 'fecha_entrega_real',
			if(cd.hora_entrega_real!='00:00:00', SUBSTR(cd.hora_entrega_real,1,5),'') as 'hora_entrega_real',
	        cd.n_emision_cobro as n_emision_cobro,
	        cd.observaciones_trabajos as observaciones_trabajos,
	        if(cd.factor_cobro!='',cd.factor_cobro,'') as 'factor_cobro',
	     	if(cd.valor_uf!='',cd.valor_uf,'') as 'valor_uf',
	     	if(cd.valor_uf_total!='',cd.valor_uf_total,'') as 'valor_uf_total',
	     	if(cd.valor_total_peso!='',cd.valor_total_peso,'') as 'valor_total_peso',
	        cd.observaciones as observaciones,
			if(cd.fecha_cierre_informe!='1970-01-01' and cd.fecha_cierre_informe!='0000-00-00',cd.fecha_cierre_informe,'') as 'fecha_cierre_informe',
	     	if(cd.registro_fecha!='1970-01-01' and cd.registro_fecha!='0000-00-00',cd.registro_fecha,'') as 'registro_fecha',
	      	if(cd.registro_hora!='00:00:00', SUBSTR(cd.registro_hora,1,5),'') as 'registro_hora',
	        cd.factura_numero as factura_numero,
			if(cd.factura_fecha!='1970-01-01' and cd.factura_fecha!='0000-00-00',cd.factura_fecha,'') as 'factura_fecha',
	      	if(cd.factura_valor!=0,cd.factura_valor,'') as 'factura_valor',
	        cd.id_digitador as id_digitador,
	        cd.ultima_actualizacion as ultima_actualizacion,

	        cdc.comuna as comuna,
	        cdr.region as region,
	        cde.estado as estado,
	        cdt.tipo as tipo,
			
			CONCAT(u.primer_nombre,' ',u.apellido_paterno) as 'relevador',
			CONCAT(u2.primer_nombre,' ',u2.apellido_paterno) as 'dibujante',
			CONCAT(u3.primer_nombre,' ',u3.apellido_paterno) as 'disenador_fo',
			CONCAT(u4.primer_nombre,' ',u4.apellido_paterno) as 'disenador_rf',
			CONCAT(u5.primer_nombre,' ',u5.apellido_paterno) as 'digitador'

			");
						

		$this->db->from('cdd as cd');
		$this->db->join('cdd_comunas as cdc', 'cdc.id = cd.id_comuna', 'left');
		$this->db->join('cdd_regiones as cdr', 'cdr.id = cd.id_region', 'left');
		$this->db->join('cdd_tipos as cdt', 'cdt.id = cd.id_tipo', 'left');
		$this->db->join('cdd_estados as cde', 'cde.id = cd.id_estado', 'left');

		$this->db->join('usuario as u', 'u.id = cd.id_relevador', 'left');
		$this->db->join('usuario as u2', 'u2.id = cd.id_dibujante', 'left');
		$this->db->join('usuario as u3', 'u3.id = cd.id_disenador_fo', 'left');
		$this->db->join('usuario as u4', 'u4.id = cd.id_disenador_rf', 'left');
		$this->db->join('usuario as u5', 'u5.id = cd.id_digitador', 'left');

		$this->db->where('sha1(cd.id)', $hash);
		$res=$this->db->get();
		if($res->num_rows()>0){
			return $res->result_array();
		}
		return FALSE;
	}

	public function getCddPeData($hash){
		$this->db->select("*,			
			if(cantidad!='0',cantidad,'') as 'cantidad'");
		$this->db->order_by('id', 'asc');
		$this->db->order_by('id', 'id_actividad');
		$this->db->where('sha1(id_cdd)', $hash);
		$res=$this->db->get('cdd_actividades_detalle');
		return $res->result_array();
	}

	public function ListaPE($id){
		$this->db->select("c.id as id,
						ca.pe as pe,
						ca.id as id_act,
						ca.nombre as nombre_actividad,
						c.factor_cobro as factor_cobro,
						c.id_tipo as tipo,
						co.factor_por_zona as factor_por_zona,
						ca.valor as valor_pe,
						c.valor_uf as valor_uf,
			            if(cad.cantidad!=0,cad.cantidad,'') as 'cantidad',
			            if(cad.valor!=0,cad.valor,'') as 'valor_detalle',
			            cad.valor as valor_detalle2,
			            c.valor_uf as valor_uf_format,	
			            if(cad.valor!=0,FORMAT((cad.valor/c.valor_uf),3),'') as valor_detalle_uf
			            ");

		$this->db->join('cdd as c', 'c.id = cad.id_cdd', 'left');
		$this->db->join('cdd_regiones as r', 'r.id = c.id_region', 'left');
		$this->db->join('cdd_comunas as co', 'co.id = c.id_comuna', 'left');
		$this->db->join('cdd_actividades as ca', 'ca.id = cad.id_actividad', 'left');
		$this->db->where('cad.id_cdd', $id);
		$res=$this->db->get('cdd_actividades_detalle as cad');
		return $res->result_array();

	}


	public function insertaPeCdd($data){
		if($this->db->insert('cdd_actividades_detalle', $data)){
			return TRUE;
		}
		return FALSE;
	}

	
	public function getTipo($hash){
		$this->db->select('id_tipo');
		$this->db->where('sha1(id)' , $hash);
		$res=$this->db->get('cdd');
		$row=$res->row_array();
		return $row["id_tipo"];
	}

	public function getValorPE($id){
		$this->db->select('valor');
		$this->db->where('id' , $id);
		$res=$this->db->get('cdd_actividades');
		$row=$res->row_array();
		return $row["valor"];
	}

	public function getValorUf($hash){
		$this->db->select('valor_uf');
		$this->db->where('sha1(id)' , $hash);
		$res=$this->db->get('cdd');
		$row=$res->row_array();
		return $row["valor_uf"];
	}

	public function getFactorZona($comuna){
		$this->db->select('factor_por_zona');
		$this->db->where('id' , $comuna);
		$res=$this->db->get('cdd_comunas');
		$row=$res->row_array();
		return $row["factor_por_zona"];
	}

	public function getTotalPE($id){
		$this->db->select('sum(valor) as total');
		$this->db->where('id_cdd', $id);	
    	$this->db->group_by('id_cdd');
		$res=$this->db->get('cdd_actividades_detalle');
		$row=$res->row_array();
		return $row["total"];
	}

	public function getIdFromHash($hash){
		$this->db->select('id');
		$this->db->where('sha1(id)', $hash);
		$res=$this->db->get('cdd');
		$row=$res->row_array();
		return $row["id"];
	}

	public function getLastId(){
		$this->db->select('id');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$res=$this->db->get('cdd');
		$row=$res->row_array();
		return $row["id"];
	}

	
	public function modPeCdd($id,$data){
		$this->db->where('id', $id);
		if($this->db->update('cdd_actividades_detalle', $data)){
			return TRUE;
		}
		return FALSE;
	}


	public function nuevoCdd($data){
		if($this->db->insert('cdd', $data)){
			return TRUE;
		}
		return FALSE;
	}


	public function modCdd($id,$data){
		$this->db->where('sha1(id)', $id);
		if($this->db->update('cdd', $data)){
			return TRUE;
		}
		return FALSE;
	}

	public function getPE(){
		$this->db->order_by('pe', 'asc');
		$res=$this->db->get('cdd_actividades');
		return $res->result_array();
	}

	public function getRegiones(){
		$this->db->order_by('id', 'asc');
		$res=$this->db->get('cdd_regiones');
		return $res->result_array();
	}

	public function getEstados(){
		$this->db->order_by('id', 'asc');
		$res=$this->db->get('cdd_estados');
		return $res->result_array();
	}

	public function getTipos(){
		$this->db->order_by('id', 'asc');
		$res=$this->db->get('cdd_tipos');
		return $res->result_array();
	}

	public function getUsuariosDibDis(){
		$this->db->select("id,empresa,CONCAT(primer_nombre,' ',apellido_paterno,' ',apellido_materno) as 'nombre'");
		$this->db->order_by('primer_nombre', 'asc');
		$this->db->where('estado', "Activo");
		$this->db->where('id_areakm', 9);
		$res=$this->db->get('usuario');
		return $res->result_array();
	}

	public function getReveladores(){
		$this->db->select("cup.id_usuario as id, 
			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'nombre'
			");
		$this->db->join('usuario as u', 'u.id = cup.id_usuario', 'left');
		$this->db->order_by('u.primer_nombre', 'asc');
		$this->db->where('cup.estado', 0);
		$this->db->where('cup.id_perfil', 1);
		$res=$this->db->get('cdd_usuarios_perfiles as cup');
		return $res->result_array();
	}

	public function getDibujantes(){
		$this->db->select("cup.id_usuario as id, 
			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'nombre'
			");	

		$this->db->join('usuario as u', 'u.id = cup.id_usuario', 'left');
		$this->db->order_by('u.primer_nombre', 'asc');
		$this->db->where('cup.estado', 0);
		$this->db->where('cup.id_perfil', 2);
		$res=$this->db->get('cdd_usuarios_perfiles as cup');
		return $res->result_array();
	}

	public function getDisenadorFO(){
		$this->db->select("cup.id_usuario as id, 
			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'nombre'
			");		
		$this->db->join('usuario as u', 'u.id = cup.id_usuario', 'left');
		$this->db->order_by('u.primer_nombre', 'asc');
		$this->db->where('cup.estado', 0);
		$this->db->where('cup.id_perfil', 3);
		$res=$this->db->get('cdd_usuarios_perfiles as cup');
		return $res->result_array();
	}

	public function getDisenadorRF(){
		$this->db->select("cup.id_usuario as id, 
			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'nombre'
			");

		$this->db->join('usuario as u', 'u.id = cup.id_usuario', 'left');
		$this->db->order_by('u.primer_nombre', 'asc');
		$this->db->where('cup.estado', 0);
		$this->db->where('cup.id_perfil', 4);
		$res=$this->db->get('cdd_usuarios_perfiles as cup');
		return $res->result_array();
	}

	public function getComunas($id_region){
		$this->db->select('id,comuna,id_region,factor_por_zona');
		$this->db->where('id_region', $id_region);
		$this->db->order_by('comuna', 'asc');
		$res=$this->db->get('cdd_comunas');
		return $res->result_array();
	}

	public function eliminaCdd($id){
	  $this->db->where('sha1(id)', $id);
	  if($this ->db->delete('cdd')){
	  	$this->db->where('sha1(id_cdd)', $id);
	    $this ->db->delete('cdd_actividades_detalle');
	  	return TRUE;
	  }
	  return FALSE;
	}


/************USUARIOS**********************/
	
	public function getUsuarios(){
		$this->db->select('u.id as id,
			u.primer_nombre as primer_nombre,
			u.apellido_paterno as apellido_paterno,
			u.apellido_materno as apellido_materno,
			u.empresa as empresa');
		$this->db->where('estado', "Activo");
		$this->db->order_by('u.primer_nombre', 'asc');
		$res=$this->db->get("usuario u");
		if($res->num_rows()>0){
			$array=array();
			foreach($res->result_array() as $key){
				$temp=array();
				$temp["id"]=$key["id"];
				$temp["text"]=$key["primer_nombre"]." ".$key["apellido_paterno"]." ".$key["apellido_materno"]." | ".$key["empresa"];
				$array[]=$temp;
			}
			return json_encode($array);
		}
		return FALSE;
	}


	public function getPerfiles(){
			$this->db->order_by('id', 'asc');
			$res=$this->db->get('cdd_perfiles');
		return $res->result_array();
	}

	public function listaMantUsuarios(){
		$this->db->select("sha1(cup.id) as hash_id,
			cup.id as id_mant,
			cup.estado as estado,
			u.id as id_usuario,
			u.rut as rut,
			c.cargo as cargo,
			cup.estado as estado,

			CASE 
	          WHEN cup.estado = '0' THEN 'Activo'
	          WHEN cup.estado = '1' THEN 'No activo'
	        END AS estado_str,

			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'usuario',
			p.perfil as perfil,
			p.id as id_perfil,
			cup.ultima_actualizacion as ultima_actualizacion
			");

		$this->db->join('cdd_usuarios_perfiles as cup', 'cup.id_usuario = u.id', 'right');
		$this->db->join('cdd_perfiles as p', 'p.id = cup.id_perfil', 'left');
		$this->db->join('mantenedor_cargo as c', 'u.id_cargo = c.id', 'left');
		$res=$this->db->get('usuario as u');
		return $res->result_array();
	}

	public function formMantUs($data){
		if($this->db->insert('cdd_usuarios_perfiles', $data)){
			return TRUE;
		}
		return FALSE;
	}

	public function modFormMantUs($id,$data){
		$this->db->where('sha1(id)', $id);
		if($this->db->update('cdd_usuarios_perfiles', $data)){
			return TRUE;
		}
		return FALSE;
	}


	public function getDataMantUs($hash){
		$this->db->select("sha1(cup.id) as hash_id,
			cup.id as id_mant,
			cup.estado as estado,
			u.id as id_usuario,
			u.rut as rut,
			c.cargo as cargo,
			cup.estado as estado,

			CASE 
	          WHEN cup.estado = '0' THEN 'Activo'
	          WHEN cup.estado = '1' THEN 'No activo'
	        END AS estado_str,

			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'usuario',
			p.perfil as perfil,
			p.id as id_perfil,
			cup.ultima_actualizacion as ultima_actualizacion
			");

		$this->db->join('cdd_usuarios_perfiles as cup', 'cup.id_usuario = u.id', 'right');
		$this->db->join('cdd_perfiles as p', 'p.id = cup.id_perfil', 'left');
		$this->db->join('mantenedor_cargo as c', 'u.id_cargo = c.id', 'left');	
		$this->db->where('sha1(cup.id)', $hash);
		$res=$this->db->get('usuario as u');
		return $res->result_array();
	
	}

	public function checkUsuario($id_usuario,$perfil){
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('id_perfil', $perfil);
		$res=$this->db->get('cdd_usuarios_perfiles');
		if($res->num_rows()>0){
			return TRUE;
		}
		return FALSE;
	}

	public function checkUsuarioMod($hash,$id){
		$this->db->where('sha1(id)', $hash);
		$this->db->where('id_usuario<>', $id);
		$res=$this->db->get('cdd_usuarios_perfiles');
		if($res->num_rows()>0){
			return TRUE;
		}
		return FALSE;
	}

	public function eliminaUsuario($hash){
	  $this->db->where('sha1(id)', $hash);
	  $this ->db->delete('cdd_usuarios_perfiles');
	  return TRUE;
	}



	/*************REPORTES******************/

		public function reporteTrabajadores($desde,$hasta,$tipo_inf,$estado,$tipo,$usuario){
			$this->db->select("c.id as id,
				count(c.id) as cantidad,
				CONCAT(u.primer_nombre,' ',u.apellido_paterno) as 'nombre'");

			switch ($tipo) {
				case 1:$this->db->join('usuario as u', 'u.id = c.id_relevador', 'left');break;
				case 2:$this->db->join('usuario as u', 'u.id = c.id_dibujante', 'left');break;
				case 3:$this->db->join('usuario as u', 'u.id = c.id_disenador_fo', 'left');break;
				case 4:$this->db->join('usuario as u', 'u.id = c.id_disenador_rf', 'left');break;
			}
			$this->db->join('cdd_usuarios_perfiles as cup', 'cup.id_usuario = u.id', 'left');
			$this->db->join('cdd_perfiles as p', 'p.id = cup.id_perfil', 'left');	
			$this->db->where('p.id', $tipo);
			
			if($desde!="" and $hasta!=""){
				$this->db->where("c.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");	
			}

			if($estado!=""){
				$this->db->where('c.id_estado', $estado);
			}

			if($tipo_inf!=""){
				$this->db->where('c.id_tipo', $tipo_inf);
			}

			if($usuario!=""){$this->db->where('u.id', $usuario);}

			$this->db->group_by('u.id');
			$res=$this->db->get('cdd as c');
			return $res->result_array();
		}

		
		public function reporteConsolidado($desde,$hasta,$tipo_inf,$estado,$usuario){
		//public function reporteConsolidado(){
			$this->db->select("cup.id_usuario as id_usuario,CONCAT(u.primer_nombre,' ',u.apellido_paterno) as 'nombre'");
			$this->db->join('usuario as u', 'u.id = cup.id_usuario', 'left');
			if($usuario!=""){$this->db->where('cup.id_usuario', $usuario);}
			$this->db->group_by('cup.id_usuario');
			$this->db->order_by('u.primer_nombre', 'asc');
			$res=$this->db->get('cdd_usuarios_perfiles as cup');

			$array=array();
			foreach($res->result_array() as $key){
				$this->db->select("count(c.id) as cantidad");	
				$this->db->where('c.id_relevador', $key["id_usuario"]);
				if($desde!="" and $hasta!=""){$this->db->where("c.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");}
				if($estado!=""){$this->db->where('c.id_estado', $estado);}
				if($tipo_inf!=""){$this->db->where('c.id_tipo', $tipo_inf);}
				$res_rel=$this->db->get("cdd as c");
				$row_rel=$res_rel->row_array();

				$this->db->select("count(c.id) as cantidad");	
				$this->db->where('c.id_dibujante', $key["id_usuario"]);
				if($desde!="" and $hasta!=""){$this->db->where("c.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");}
				if($estado!=""){$this->db->where('c.id_estado', $estado);}
				if($tipo_inf!=""){$this->db->where('c.id_tipo', $tipo_inf);}
				$res_dib=$this->db->get("cdd as c");
				$row_dib=$res_dib->row_array();

				$this->db->select("count(c.id) as cantidad");	
				$this->db->where('c.id_disenador_fo', $key["id_usuario"]);
				if($desde!="" and $hasta!=""){$this->db->where("c.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");}
				if($estado!=""){$this->db->where('c.id_estado', $estado);}
				if($tipo_inf!=""){$this->db->where('c.id_tipo', $tipo_inf);}
				$res_disfo=$this->db->get("cdd as c");
				$row_disfo=$res_disfo->row_array();

				$this->db->select("count(c.id) as cantidad");	
				$this->db->where('c.id_disenador_rf', $key["id_usuario"]);
				if($desde!="" and $hasta!=""){$this->db->where("c.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");}
				if($estado!=""){$this->db->where('c.id_estado', $estado);}
				if($tipo_inf!=""){$this->db->where('c.id_tipo', $tipo_inf);}
				$res_disrf=$this->db->get("cdd as c");
				$row_disrf=$res_disrf->row_array();

				$nombre=$key["nombre"];
				$numero_actividades=$row_rel["cantidad"]+$row_dib["cantidad"]+$row_disfo["cantidad"]+$row_disrf["cantidad"];

				$this->db->select("count(c.id) as cantidad");	
				if($desde!="" and $hasta!=""){$this->db->where("c.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");}
				if($estado!=""){$this->db->where('c.id_estado', $estado);}
				if($tipo_inf!=""){$this->db->where('c.id_tipo', $tipo_inf);}
				$this->db->where('(c.id_relevador="'.$key["id_usuario"].'" or c.id_dibujante="'.$key["id_usuario"].'" or c.id_disenador_fo="'.$key["id_usuario"].'" or c.id_disenador_rf="'.$key["id_usuario"].'")');
				$res_ids=$this->db->get("cdd as c");
				$row_ids=$res_ids->row_array();

				$cantidad_ids=$row_ids["cantidad"];

				$temp=array();
				$temp["nombre"]=$nombre;
				$temp["numero_actividades"]=$numero_actividades;
				$temp["cantidad_ids"]=$cantidad_ids;
				$array[]=$temp;
				$temp=array();
			}

			return $array;
		}

	public function getUsuariosRep(){
		$this->db->select("u.id as id,
			u.empresa as empresa,
			CONCAT(u.primer_nombre,' ',u.apellido_paterno,' ',u.apellido_materno) as 'nombre'");
		$this->db->join('cdd_usuarios_perfiles cup', 'cup.id_usuario = u.id', 'left');
		$this->db->where('u.estado', "Activo");		
		$this->db->where('cup.estado', "0");		
		$this->db->group_by('cup.id_usuario');
		$this->db->order_by('u.primer_nombre', 'asc');
		$res=$this->db->get('usuario as u');
		return $res->result_array();
	}

	public function reporteCobros($desde,$hasta,$tipo_inf,$estado){
		$this->db->select("SHA1(cd.id) as 'hash_id',
			cd.id as id,
			cd.nombre_proyecto as nombre_proyecto,
			cd.id_region as id_region,
			cd.id_comuna as id_comuna,
			cd.id_tipo as id_tipo,
			cd.ot as ot,
			cd.num_proyecto as num_proyecto,
			cd.ingeniero as ingeniero,
			if(cd.fecha_asignacion!='1970-01-01' and cd.fecha_asignacion!='0000-00-00',cd.fecha_asignacion,'') as 'fecha_asignacion',
			if(cd.hora_asignacion!='00:00:00', SUBSTR(cd.hora_asignacion,1,5),'') as 'hora_asignacion',
			if(cd.fecha_entrega_prog!='1970-01-01' and cd.fecha_entrega_prog!='0000-00-00',cd.fecha_entrega_prog,'') as 'fecha_entrega_prog',
			if(cd.fecha_relevador!='1970-01-01' and cd.fecha_relevador!='0000-00-00',cd.fecha_relevador,'') as 'fecha_relevador',
	        cd.id_estado as id_estado,
			if(cd.fecha_entrega_real!='1970-01-01' and cd.fecha_entrega_real!='0000-00-00',cd.fecha_entrega_real,'') as 'fecha_entrega_real',
	        cd.n_emision_cobro as n_emision_cobro,
			if(cd.fecha_cierre_informe!='1970-01-01' and cd.fecha_cierre_informe!='0000-00-00',cd.fecha_cierre_informe,'') as 'fecha_cierre_informe',
	     	if(cd.factor_cobro!='',cd.factor_cobro,'') as 'factor_cobro',
	     	if(cd.valor_uf!='',cd.valor_uf,'') as 'valor_uf',
	     	if(cd.valor_uf_total!='',cd.valor_uf_total,'') as 'valor_uf_total',
	     	if(cd.valor_total_peso!='',cd.valor_total_peso,'') as 'valor_total_peso',
	     	if(cd.registro_fecha!='1970-01-01' and cd.registro_fecha!='0000-00-00',cd.registro_fecha,'') as 'registro_fecha',
	      	if(cd.registro_hora!='00:00:00', SUBSTR(cd.registro_hora,1,5),'') as 'registro_hora',
	        cd.factura_numero as factura_numero,
			if(cd.factura_fecha!='1970-01-01' and cd.factura_fecha!='0000-00-00',cd.factura_fecha,'') as 'factura_fecha',
	      	if(cd.factura_valor!=0,cd.factura_valor,'') as 'factura_valor',

	        cdc.comuna as comuna,
	        cdc.factor_por_zona as factor_por_zona,
	        cdr.region as region,
	        cde.estado as estado,
	        cdt.tipo as tipo,

			");
					
		$this->db->from('cdd as cd');
		$this->db->join('cdd_comunas as cdc', 'cdc.id = cd.id_comuna', 'left');
		$this->db->join('cdd_regiones as cdr', 'cdr.id = cd.id_region', 'left');
		$this->db->join('cdd_tipos as cdt', 'cdt.id = cd.id_tipo', 'left');
		$this->db->join('cdd_estados as cde', 'cde.id = cd.id_estado', 'left');

		if($desde!="" and $hasta!=""){
			$this->db->where("cd.fecha_entrega_prog BETWEEN '".$desde."' AND '".$hasta."'");	
		}

		if($estado!=""){
			$this->db->where('cd.id_estado', $estado);
		}

		if($tipo_inf!=""){
			$this->db->where('cd.id_tipo', $tipo_inf);
		}

		$res=$this->db->get();
		if($res->num_rows()>0){
			return $res->result_array();
		}
		return FALSE;
	}


}