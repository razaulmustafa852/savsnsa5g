# Investigating the Impact of Channel Metrics in 5G NSA and SA on Video Streaming QoE
Evaluating the Quality of Experience~(QoE) of YouTube video streaming from a Mobile Network Operator (MNO) perspective is challenging. 
The research community is actively working on evolved approaches to deliver improved end-users' QoE and provide adequate methods to manage increased video traffic demands, including 5G-aware machine learning stall, throughput and quality shifts prediction. In this work, we collected a real-time dataset using commercial 5G networks by running 4K videos using  YouTube as a baseline. While in the background, we monitor cellular Key Performance Indicators (KPIs) comprised of Channel Level Metrics (CLM), i.e., RSRQ, RSRP and SNR, among other metrics with the smallest granularity of 1 second. We save both YouTube QoE and CLM in the database for further analysis. We consider a rich set of use cases for this campaign, e.g., Static Indoor, Low- Moderate- and High Mobility.  Next, we present a correlation of channel-related metrics KPIs in 5G- SA and NSA with the objective QoE of YouTube, i.e., stall (buffering) and quality shifts. We also addressed which deployment (SA, NSA) offers better QoE for immersive 360 videos under mobility scenarios.  Our findings indicate that channel metrics indeed influence YouTube's QoE, and both 5G deployments offer benefits under different network settings and environments. Our anonymized dataset enables other researchers to delve deeper into this subject and utilize these traces to establish a more definitive connection between KPIs and QoE.

Data is available on this link:


## 📝 Folder Descriptions

- **📁 Data/**
  - Contains:
    - `extreme/`
      - `nsa/`
    - `indoor/`
       - `op1 - Operator 1/`
          - `nsa/`
          - `sa/`
       - `op2- Operator 2/`
          - `nsa/`
    - `low-mobility/`
       - `nsa/`
       - `sa/`
    - `mobility/`
       - `nsa/`
       - `sa/`
    
## 📝 Files Explanations

- We provide a single file along with each experiment in a single folder as well.
- If you consider a single file (`all.csv`), it contains NR - Channel Logs. However, there is a column named `source_file` that contains the unique ID of each experiment. You can search its corresponding QoE and QoE Events in files (`QoE.csv`) and (`events.csv`). To find the corresponding QoE and QoE Logs, the column `Eid` will match the `source_file`.
- Each experiment is also divided into separate files, including `Channel logs`, `QoE`, and `QoE Events`. These files can be found in the `experiments` folder corresponding to each use case, such as `Indoor`, `Extreme`, `Low Mobility`, and `Mobility` including both technologies `NSA` and `SA`.


