/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serviciosoa;

/**
 *
 * @author Jezer
 */
public class Contenedor {
    
  private final int id_contenedor, capacidad, id_usuario, id_tipoContenedor;
  private final boolean estadoContenedor;


  public Contenedor(final int id_contenedor, final int capacidad, final boolean estadoContenedor, final int  id_usuario, final int id_tipoContenedor) {
      this.id_contenedor = id_contenedor;
      this.capacidad = capacidad;
      this.estadoContenedor = estadoContenedor;
      this.id_usuario = id_usuario;
      this.id_tipoContenedor = id_tipoContenedor;
  }
}