const getData = async (url) => {
  return await fetch(url).then((res) => res.json());
};

const getRGBA = () => {
  r = Math.floor(Math.random() * 255);
  g = Math.floor(Math.random() * 255);
  b = Math.floor(Math.random() * 255);
  return `rgba(${r}, ${g}, ${b}, 0.2)`;
};

const draw = (data, ctx, title, type = 'pie') => {
  let colors = data.labels.map((label) => getRGBA());

  new Chart(ctx, {
    type,
    data: {
      labels: data.labels,
      datasets: [
        {
          label: title,
          data: data.values,
          backgroundColor: colors,
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
};

const nacimientosCanton = document.querySelector('#nac-cant');
const nacimientosAsistencia = document.querySelector('#nac-asis');
const nacimientosEstCivil = document.querySelector('#nac-civ');
const nacimientosInstruccion = document.querySelector('#nac-inst');
const nacimientosOcurrencia = document.querySelector('#nac-ocu');
const nacimientosProducto = document.querySelector('#nac-prod');

const defuncionesCanton = document.querySelector('#defs-cant');
const defuncionesCausa = document.querySelector('#defs-causa');
const defuncionesNivel = document.querySelector('#defs-niv');
const defuncionesSemana = document.querySelector('#defs-sem');
const defuncionesEstado = document.querySelector('#defs-est');
const defuncionesOcurrencia = document.querySelector('#defs-ocu');

// ========================================
//                 Nacimientos
// ========================================

if (nacimientosCanton) {
  const prov = 'Pichincha';
  getData(`/nacimientos/provincia/${prov}`).then((res) => {
    const labels = res.map((val) => val['Provincia']);
    const values = res.map((val) => val.Nacidos);
    draw({ labels, values }, nacimientosCanton, 'Provincias', 'bar');
  });
}

if (nacimientosAsistencia) {
  getData('/nacimientos/asistencias').then((res) => {
    const labels = res.map((val) => val['Asistido por']);
    const values = res.map((val) => val.Nacidos);
    draw({ labels, values }, nacimientosAsistencia, 'Asistencia');
  });
}

if (nacimientosEstCivil) {
  getData('/nacimientos/estadocivil').then((res) => {
    const labels = res.map((val) => val['Estado civil']);
    const values = res.map((val) => val.Nacidos);
    draw({ labels, values }, nacimientosEstCivil, 'Estado civil');
  });
}

if (nacimientosInstruccion) {
  getData(`/nacimientos/instruccion`).then((res) => {
    const labels = res.map((val) => val['Nivel Insitucional']);
    const values = res.map((val) => val.Nacidos);
    draw({ labels, values }, nacimientosInstruccion, 'Nivel eduacion', 'bar');
  });
}

if (nacimientosOcurrencia) {
  getData(`/nacimientos/ocurrencia`).then((res) => {
    const labels = res.map((val) => val['Lugar de ocurrencia']);
    const values = res.map((val) => val.Nacidos);
    draw({ labels, values }, nacimientosOcurrencia);
  });
}

if (nacimientosProducto) {
  getData(`/nacimientos/producto`).then((res) => {
    const labels = res.map((val) => val['Producto Embarazo']);
    const values = res.map((val) => val.Nacidos);
    draw({ labels, values }, nacimientosProducto);
  });
}

// ========================================
//                 Defunciones
// ========================================

if (defuncionesCanton) {
  let prov = 'Azuay';
  getData(`/defunciones/provincia`).then((res) => {
    const labels = res.map((val) => val['PROVINCIA']);
    const values = res.map((val) => +val['Nacidos']);

    draw({ labels, values }, defuncionesCanton, 'Provincias', 'bar');
  });
}

if (defuncionesCausa) {
  getData(`/defunciones/causa`).then((res) => {
    res = res.sort((a, b) => b.TOTAL - a.TOTAL);
    res = res.slice(0, 6);

    const labels = res.map((val) => val['CAUSA FETAL']);
    const values = res.map((val) => +val.TOTAL);

    draw({ labels, values }, defuncionesCausa, 'Causas');
  });
}

if (defuncionesNivel) {
  getData(`/defunciones/nivel`).then((res) => {
    const labels = res.map((val) => val['EDUCACION']);
    const values = res.map((val) => +val.TOTAL);

    draw({ labels, values }, defuncionesNivel, 'nivel eduacion', 'bar');
  });
}

if (defuncionesSemana) {
  getData(`/defunciones/semana`).then((res) => {
    const labels = res.map((val) => val['SEMANA GESTACION']);
    const values = res.map((val) => +val.TOTAL);

    draw({ labels, values }, defuncionesSemana, 'Semana de gestacion', 'bar');
  });
}

if (defuncionesEstado) {
  getData(`/defunciones/estado`).then((res) => {
    const labels = res.map((val) => val['ESTADO CIVIL']);
    const values = res.map((val) => +val.TOTAL);

    draw({ labels, values }, defuncionesEstado);
  });
}

if (defuncionesOcurrencia) {
  getData(`/defunciones/ocurrencia`).then((res) => {
    const labels = res.map((val) => val['LUGAR DE OCURRENCIA']);
    const values = res.map((val) => +val.TOTAL);

    draw({ labels, values }, defuncionesOcurrencia);
  });
}
