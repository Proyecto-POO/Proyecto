<?php

	class especificaciones{

		private $codigoTipoE;
		private $codigoJuego;
		private $sistemaOperativo;
		private $tarjetaGrafica;
		private $ram;
		private $cpu;

		public function __construct($codigoTipoE,
					$codigoJuego,
					$sistemaOperativo,
					$tarjetaGrafica,
					$ram,
					$cpu){
			$this->codigoTipoE = $codigoTipoE;
			$this->codigoJuego = $codigoJuego;
			$this->sistemaOperativo = $sistemaOperativo;
			$this->tarjetaGrafica = $tarjetaGrafica;
			$this->ram = $ram;
			$this->cpu = $cpu;
		}
		public function getCodigoTipoE(){
			return $this->codigoTipoE;
		}
		public function setCodigoTipoE($codigoTipoE){
			$this->codigoTipoE = $codigoTipoE;
		}
		public function getCodigoJuego(){
			return $this->codigoJuego;
		}
		public function setCodigoJuego($codigoJuego){
			$this->codigoJuego = $codigoJuego;
		}
		public function getSistemaOperativo(){
			return $this->sistemaOperativo;
		}
		public function setSistemaOperativo($sistemaOperativo){
			$this->sistemaOperativo = $sistemaOperativo;
		}
		public function getTarjetaGrafica(){
			return $this->tarjetaGrafica;
		}
		public function setTarjetaGrafica($tarjetaGrafica){
			$this->tarjetaGrafica = $tarjetaGrafica;
		}
		public function getRam(){
			return $this->ram;
		}
		public function setRam($ram){
			$this->ram = $ram;
		}
		public function getCpu(){
			return $this->cpu;
		}
		public function setCpu($cpu){
			$this->cpu = $cpu;
		}

		public function guardarEspecificaciones($conexion){
			$sql = sprintf(
				"INSERT INTO tbl_especificaciones(
						codigo_especificaciones, 
						codigo_tipo_especificaciones, 
						codigo_juego, 
						sistema_operativo, 
						ram, 
						targeta_grafica, 
						cpu
						) VALUES (
						NULL,'%s','%s','%s','%s','%s','%s')",
						stripslashes($this->codigoTipoE),
						stripslashes($this->codigoJuego),
						stripslashes($this->sistemaOperativo),
						stripslashes($this->ram),
						stripslashes($this->tarjetaGrafica),
						stripslashes($this->cpu)
				);

			echo "<br>Instruccion a ejecutar: ".$sql;
			$resultado=$conexion->ejecutarInstruccion($sql);
			$conexion->liberarResultado($resultado);
		}


	}
?>