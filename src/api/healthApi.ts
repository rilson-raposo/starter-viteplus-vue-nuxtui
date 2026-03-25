import axios from "axios";

type HealthResponse = {
  ok: boolean;
  service: string;
  timestamp: string;
};

export async function getApiHealth(): Promise<HealthResponse> {
  const apiUrl = `${import.meta.env.BASE_URL}api/health`;
  const response = await axios.get<HealthResponse>(apiUrl);

  return response.data;
}
