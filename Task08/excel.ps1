$excel = New-Object -ComObject Excel.Application

$workbook = $excel.Workbooks.Add()

$sheet = $workbook.ActiveSheet

$cell = $sheet.Cells.Item(2, 2)
$cell.Value2 = "Привет от PowerShell"
$cell.Font.Size = 12
$cell.Font.Italic = $true

$currentUser = $env:USERNAME
$computerName = $env:COMPUTERNAME

$fileName = "$currentUser`_$computerName.xlsx"
$savePath = Join-Path $PSScriptRoot $fileName
$workbook.SaveAs($savePath)

$workbook.Close()
$excel.Quit()
