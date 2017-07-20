<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Engagement List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>Code</th>
		<th>EngagementDate</th>
		<th>ClientId</th>
		<th>ServiceTitleId</th>
		<th>YearService</th>
		<th>Description</th>
		<th>PartnerId</th>
		<th>ManagerId</th>
		<th>SeniorId</th>
		<th>Complexity</th>
		<th>Risk</th>
		<th>AgreedFees</th>
		<th>AgreedExpenses</th>
		<th>EstimatedCost</th>
		<th>SigningPartnerId</th>
		<th>EngagementPartnerId</th>
		<th>Asset</th>
		<th>Rl</th>
		<th>ReportNo</th>
		<th>ReportDate</th>
		<th>Opinion</th>
		<th>JobFromEmployeeId</th>
		<th>FinishStatusId</th>
		<th>FinishDate</th>
		<th>FinishApproveBy</th>
		<th>Closing</th>
		<th>ClosingDate</th>
		<th>Deleted</th>
		<th>Inputby</th>
		<th>Version</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($engagement_data as $engagement)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $engagement->entityId ?></td>
		      <td><?php echo $engagement->code ?></td>
		      <td><?php echo $engagement->engagementDate ?></td>
		      <td><?php echo $engagement->clientId ?></td>
		      <td><?php echo $engagement->serviceTitleId ?></td>
		      <td><?php echo $engagement->yearService ?></td>
		      <td><?php echo $engagement->description ?></td>
		      <td><?php echo $engagement->partnerId ?></td>
		      <td><?php echo $engagement->managerId ?></td>
		      <td><?php echo $engagement->seniorId ?></td>
		      <td><?php echo $engagement->complexity ?></td>
		      <td><?php echo $engagement->risk ?></td>
		      <td><?php echo $engagement->agreedFees ?></td>
		      <td><?php echo $engagement->agreedExpenses ?></td>
		      <td><?php echo $engagement->estimatedCost ?></td>
		      <td><?php echo $engagement->signingPartnerId ?></td>
		      <td><?php echo $engagement->engagementPartnerId ?></td>
		      <td><?php echo $engagement->asset ?></td>
		      <td><?php echo $engagement->rl ?></td>
		      <td><?php echo $engagement->reportNo ?></td>
		      <td><?php echo $engagement->reportDate ?></td>
		      <td><?php echo $engagement->opinion ?></td>
		      <td><?php echo $engagement->jobFromEmployeeId ?></td>
		      <td><?php echo $engagement->finishStatusId ?></td>
		      <td><?php echo $engagement->finishDate ?></td>
		      <td><?php echo $engagement->finishApproveBy ?></td>
		      <td><?php echo $engagement->closing ?></td>
		      <td><?php echo $engagement->closingDate ?></td>
		      <td><?php echo $engagement->deleted ?></td>
		      <td><?php echo $engagement->inputby ?></td>
		      <td><?php echo $engagement->version ?></td>
		      <td><?php echo $engagement->userCreate ?></td>
		      <td><?php echo $engagement->createDate ?></td>
		      <td><?php echo $engagement->userUpdate ?></td>
		      <td><?php echo $engagement->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>