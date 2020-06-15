(() => {
  let files = []
  document.querySelector('#anexos').addEventListener('change', ({ target }) => {
    files.push(...target.files)
    const table = document.querySelector('#arquivos tbody');
    [...target.files].forEach((file) => {
      const linha = document.createElement('tr')
      const botaoRemover = document.createElement('button')

      botaoRemover.appendChild(document.createTextNode('Remover'))
      botaoRemover.setAttribute('type', 'button')
      botaoRemover.addEventListener('click', () => {
        table.removeChild(linha)
        files = files.filter((value) => value.name !== file.name)
      });
      [
        table.querySelectorAll('tr').length,
        file.name,
        botaoRemover
      ].forEach((value) => {
        const coluna = document .createElement('td')
        coluna.appendChild(
            typeof value === 'string' ||
            value instanceof String ||
            typeof value === 'number' ||
            value instanceof Number
              ? document.createTextNode(value)
              : value
          )
        linha.appendChild(coluna)
      })
      table.appendChild(linha)
    })
  })

  document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault()
		const formData = new FormData(e.target)
		formData.delete('anexos[]')
		files.forEach((file) => {
			formData.append('anexos[]', file)
		})
		fetch('/api/processo/salvar', {
      method: 'POST',
      body: formData,
		})
		.then((res) => {
			console.log({res: res.blob()})
			window.open('/api/processo/listar', "_self")
		}, error => console.log({error}))
  })
})()
