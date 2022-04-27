<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_desempenho extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function lst_desempenho($p){
        $query = $this->db->query("SELECT
          SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
          SDISCIPLINA.NOME AS NM_DISCIPLINA,
          'A' AS TIPO,
         AVG(
          RM.F_NOTA_ETAPA_ii(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                          P_IDPERLET=>SMATRICULA.IDPERLET,
                          P_RA=>SMATRICULA.RA,
                          P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                          P_CODTURMA=>STURMADISC.CODTURMA,
                          P_CODDISC=>SDISCIPLINA.CODDISC,
                          P_CODETAPA=>12,
                          P_CODPROVA=>NULL)
                          )AS MEDIA 



                               FROM
                                 RM.SMATRICULA  ,
                                 RM.STURMADISC  ,
                                 RM.SDISCIPLINA  ,
                                 RM.SSTATUS  ,
                                 RM.SALUNO  ,
                                 RM.PPESSOA  ,
                                 RM.SPLETIVO  ,
                                 RM.GFILIAL  ,
                                 RM.STIPOCURSO
                                 
                               WHERE
                                 SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                                 SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                                 STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                                 STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                                 SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                                 SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                                 SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                                 SALUNO.RA = SMATRICULA.RA AND
                                 PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                                 SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                                 SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                                 STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                                 STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                                 SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                                 SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND
                                 
                                 

                                 (
                                   SMATRICULA.CODSTATUS in (15) and 
                                   SMATRICULA.CODCOLIGADA = 1 AND
                                   SMATRICULA.IDPERLET = 1 AND
                                   STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                                   SMATRICULA.RA = '".$p['p_ra']."' AND
                                   SMATRICULA.IDTURMADISCORIGEM IS NULL
                                   

                                   
            )
            
     GROUP BY  SDISCIPLINA.CODDISC, SDISCIPLINA.NOME
     
     
     
UNION ALL




SELECT
          SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
          SDISCIPLINA.NOME AS NM_DISCIPLINA,
          'T' AS TIPO,
      
         AVG(
          RM.F_NOTA_ETAPA_ii(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                          P_IDPERLET=>SMATRICULA.IDPERLET,
                          P_RA=>SMATRICULA.RA,
                          P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                          P_CODTURMA=>STURMADISC.CODTURMA,
                          P_CODDISC=>SDISCIPLINA.CODDISC,
                          P_CODETAPA=>12,
                          P_CODPROVA=>NULL)
                          )AS MEDIA 
                               FROM
                                 RM.SMATRICULA  ,
                                 RM.STURMADISC  ,
                                 RM.SDISCIPLINA  ,
                                 RM.SSTATUS  ,
                                 RM.SALUNO  ,
                                 RM.PPESSOA  ,
                                 RM.SPLETIVO  ,
                                 RM.GFILIAL  ,
                                 RM.STIPOCURSO
                                 
                               WHERE
                                 SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                                 SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                                 STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                                 STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                                 SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                                 SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                                 SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                                 SALUNO.RA = SMATRICULA.RA AND
                                 PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                                 SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                                 SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                                 STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                                 STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                                 SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                                 SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND
                                 
                                 

                                 (
                                   SMATRICULA.CODSTATUS in (15) and 
                                   SMATRICULA.CODCOLIGADA = 1 AND
                                   SMATRICULA.IDPERLET = 1 AND
                                   STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                                   SMATRICULA.IDTURMADISCORIGEM IS NULL                                   
                                   and  STURMADISC.CODTURMA = '".$p['p_codturma']."'
                                   
            )
            
     GROUP BY  SDISCIPLINA.CODDISC, SDISCIPLINA.NOME
       
     
     
  UNION ALL
  
  
SELECT
          SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
          SDISCIPLINA.NOME AS NM_DISCIPLINA,
          'C' AS TIPO,
         AVG(
          RM.F_NOTA_ETAPA_ii(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                          P_IDPERLET=>SMATRICULA.IDPERLET,
                          P_RA=>SMATRICULA.RA,
                          P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                          P_CODTURMA=>STURMADISC.CODTURMA,
                          P_CODDISC=>SDISCIPLINA.CODDISC,
                          P_CODETAPA=>12,
                          P_CODPROVA=>NULL)
                          )AS MEDIA 
                               FROM
                                 RM.SMATRICULA  ,
                                 RM.STURMADISC  ,
                                 RM.SDISCIPLINA  ,
                                 RM.SSTATUS  ,
                                 RM.SALUNO  ,
                                 RM.PPESSOA  ,
                                 RM.SPLETIVO  ,
                                 RM.GFILIAL  ,
                                 RM.STIPOCURSO,
                                 RM.SHABILITACAOFILIAL SHF 
                               WHERE
                                 SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                                 SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                                 STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                                 STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                                 SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                                 SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                                 SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                                 SALUNO.RA = SMATRICULA.RA AND
                                 PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                                 SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                                 SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                                 STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                                 STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                                 SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                                 SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND
                                 SHF.IDHABILITACAOFILIAL=RM.SMATRICULA.IDHABILITACAOFILIAL AND SHF.CODCURSO IN ('001','002', '003', '004') AND SHF.CODCOLIGADA=RM.SMATRICULA.CODCOLIGADA AND 

                                 (
                                   SMATRICULA.CODSTATUS in (15) and 
                                   SMATRICULA.CODCOLIGADA = 1 AND
                                   SMATRICULA.IDPERLET = 1 AND
                                   STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                                   SMATRICULA.IDTURMADISCORIGEM IS NULL                                   
                                   and SHF.CODCURSO = '002'

                                   
            )
     GROUP BY  SDISCIPLINA.CODDISC, SDISCIPLINA.NOME 
     --ORDER BY NM_DISCIPLINA");
        return $query->result_array();
    }
   

    function search_desempenho($p){
      $query = $this->db->query("SELECT
      SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
      SDISCIPLINA.NOME AS NM_DISCIPLINA,
      'A' AS TIPO,
     AVG(
      RM.F_NOTA_ETAPA_ii(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>'".$p['p_codetapa']."',
                      P_CODPROVA=>NULL)
                      )AS MEDIA 
                           FROM
                             RM.SMATRICULA  ,
                             RM.STURMADISC  ,
                             RM.SDISCIPLINA  ,
                             RM.SSTATUS  ,
                             RM.SALUNO  ,
                             RM.PPESSOA  ,
                             RM.SPLETIVO  ,
                             RM.GFILIAL  ,
                             RM.STIPOCURSO
                             
                           WHERE
                             SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                             SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                             STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                             STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                             SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                             SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SALUNO.RA = SMATRICULA.RA AND
                             PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                             SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                             SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                             STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                             STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                             SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                             SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND
                             
                             (
                               SMATRICULA.CODSTATUS in (15) and 
                               SMATRICULA.CODCOLIGADA = 1 AND
                               SMATRICULA.IDPERLET = 1 AND
                               STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                               SMATRICULA.RA = '".$p['p_ra']."' AND
                               SMATRICULA.IDTURMADISCORIGEM IS NULL           
                              )
      GROUP BY  SDISCIPLINA.CODDISC, SDISCIPLINA.NOME
      UNION ALL
      SELECT
      SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
      SDISCIPLINA.NOME AS NM_DISCIPLINA,
      'T' AS TIPO,
     AVG(
      RM.F_NOTA_ETAPA_ii(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>'".$p['p_codetapa']."',
                      P_CODPROVA=>NULL)
                      )AS MEDIA 
                           FROM
                             RM.SMATRICULA  ,
                             RM.STURMADISC  ,
                             RM.SDISCIPLINA  ,
                             RM.SSTATUS  ,
                             RM.SALUNO  ,
                             RM.PPESSOA  ,
                             RM.SPLETIVO  ,
                             RM.GFILIAL  ,
                             RM.STIPOCURSO           
                           WHERE
                             SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                             SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                             STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                             STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                             SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                             SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SALUNO.RA = SMATRICULA.RA AND
                             PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                             SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                             SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                             STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                             STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                             SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                             SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND
                             (
                               SMATRICULA.CODSTATUS in (15) and 
                               SMATRICULA.CODCOLIGADA = 1 AND
                               SMATRICULA.IDPERLET = 1 AND
                               STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                               SMATRICULA.IDTURMADISCORIGEM IS NULL                                   
                               and  STURMADISC.CODTURMA = '".$p['p_codturma']."'   
                              )
        
 GROUP BY  SDISCIPLINA.CODDISC, SDISCIPLINA.NOME
   
 
 
UNION ALL


SELECT
      SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
      SDISCIPLINA.NOME AS NM_DISCIPLINA,
      'C' AS TIPO,
     AVG(
      RM.F_NOTA_ETAPA_ii(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>'".$p['p_codetapa']."',
                      P_CODPROVA=>NULL)
                      )AS MEDIA 
                           FROM
                             RM.SMATRICULA  ,
                             RM.STURMADISC  ,
                             RM.SDISCIPLINA  ,
                             RM.SSTATUS  ,
                             RM.SALUNO  ,
                             RM.PPESSOA  ,
                             RM.SPLETIVO  ,
                             RM.GFILIAL  ,
                             RM.STIPOCURSO,
                             RM.SHABILITACAOFILIAL SHF 
                           WHERE
                             SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                             SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                             STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                             STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                             SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                             SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SALUNO.RA = SMATRICULA.RA AND
                             PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                             SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                             SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                             STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                             STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                             SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                             SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND
                             SHF.IDHABILITACAOFILIAL=RM.SMATRICULA.IDHABILITACAOFILIAL AND SHF.CODCURSO IN ('001','002', '003', '004') AND SHF.CODCOLIGADA=RM.SMATRICULA.CODCOLIGADA AND 

                             (
                               SMATRICULA.CODSTATUS in (15) and 
                               SMATRICULA.CODCOLIGADA = 1 AND
                               SMATRICULA.IDPERLET = 1 AND
                               STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                               SMATRICULA.IDTURMADISCORIGEM IS NULL                                   
                               and SHF.CODCURSO = '002'                               
        ) GROUP BY  SDISCIPLINA.CODDISC, SDISCIPLINA.NOME");
        return $query->result_array();
    }

    function lst_coeficiente($p){
      $query = $this->db->query("SELECT 
      RM.F_COEFICIENTE_REND(P_CODCOLIGADA=>1, P_IDPERLET=>1, P_RA=>'".$p['p_ra']."', P_CODETAPA=>16) MB1,
      RM.F_COEFICIENTE_REND(P_CODCOLIGADA=>1, P_IDPERLET=>1, P_RA=>'".$p['p_ra']."', P_CODETAPA=>26) MB2,
      RM.F_COEFICIENTE_REND(P_CODCOLIGADA=>1, P_IDPERLET=>1, P_RA=>'".$p['p_ra']."', P_CODETAPA=>36) MB3,
      RM.F_COEFICIENTE_REND(P_CODCOLIGADA=>1, P_IDPERLET=>1, P_RA=>'".$p['p_ra']."', P_CODETAPA=>46) MB4
      FROM DUAL");
      return $query->result_array();
    }

    function lst_coeficiente_bimestre($p){
      $query = $this->db->query("SELECT 
      RM.F_COEFICIENTE_REND(P_CODCOLIGADA=>1, P_IDPERLET=>1, P_RA=>'".$p['p_ra']."', P_CODETAPA=>'".$p['p_codetapa']."') MB
      FROM DUAL");
      return $query->result_array();
    }

}



